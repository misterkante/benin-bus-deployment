<?php

namespace App\Http\Controllers;


use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    // Liste tous les tickets
    public function index()
    {
        $tickets = Ticket::with(['trajet.depart', 'trajet.arrivee'])->get();
        return response()->json($tickets, 200);
    }

    // Générateur de code de tickets
    public function genererCodeUnique()
    {
        $prefixe = 'BENBUS-';
        $nombreAleatoire = Str::random(9); // Génère une chaîne aléatoire de 9 caractères
        $code = $prefixe . $nombreAleatoire;

        // Vérifier si le code existe déjà dans la base de données
        $ticketExistant = Ticket::where('code_ticket', $code)->exists();

        if ($ticketExistant) {
            return $this->genererCodeUnique(); // Réessayer si le code existe déjà
        }

        return $code;
    }

    // Création de ticket
    public function store(Request $request)
    {
        try {
            // Validation des données
            $validator = Validator::make($request->all(), [
                'voyage_id' => 'required|exists:voyages,id',
                'trajet_id' => 'required|exists:trajets,id',
                'prix' => 'required|numeric',
                'sieges' => 'required|array',
            ]);

            // Vérifier si la validation a échoué
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Erreur de validation',
                    'errors' => $validator->errors()
                ], 422);
            }

            $validated = $validator->validated();

            foreach ($validated['sieges'] as $siege) {
                // Ajout des attributs nécessaires pour la création
                $validated['code_ticket'] = $this->genererCodeUnique();
                $validated['user_id'] = $request->user()->id;

                // Création du ticket
                $ticket = Ticket::create($validated);
            }


            return response()->json([
                'message' => 'Ticket(s) créé(s) avec succès',
                'ticket' => $ticket
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la création du ticket',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // Affiche les détails d’un ticket
    public function show($id)
    {
        $ticket = Ticket::with(['trajet.depart', 'trajet.arrivee'])->find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Ticket non trouvé'], 404);
        }

        return response()->json($ticket, 200);
    }
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if (!$ticket) {
            return response()->json(['message' => 'Ticket non trouvé'], 404);
        }

        $validated = $request->validate([
            'voyage_id' => 'required|exists:voyages,id',
            'user_id' => 'required|exists:users,id',
            'depart_id' => 'required|exists:arrets,id',
            'arrive_id' => 'required|exists:arrets,id',
            'prix' => 'required|numeric',
        ]);

        $ticket->update($validated);
        return response()->json($ticket, 200);
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        if (!$ticket) {
            return response()->json(['message' => 'Ticket non trouvé'], 404);
        }

        $ticket->delete();
        return response()->json(['message' => 'Ticket supprimé'], 200);
    }
}
