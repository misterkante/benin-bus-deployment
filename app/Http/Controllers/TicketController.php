<?php

namespace App\Http\Controllers;


use Exception;
use App\Models\Bu;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Voyage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $nombreAleatoire = Str::upper(Str::random(9)); // Génère une chaîne aléatoire de 9 caractères
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
            $validated['user_id'] = $request->user()->id;
            $tickets = [];

            foreach ($validated['sieges'] as $siege) {
                // Ajout des attributs nécessaires pour la création
                $validated['code_ticket'] = $this->genererCodeUnique();
                $validated['siege'] = $siege;

                // Création du ticket
                $ticket = Ticket::create($validated);
                $tickets[] = $ticket;
            }


            return response()->json([
                'message' => 'Ticket(s) créé(s) avec succès',
                'ticket' => $tickets
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la création du ticket',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // Afficher les billets pour les voyages à venir
    public function next_tickets(Request $request)
    {
        try {
            $tickets = Ticket::with([
                'voyage:id,date_voyage,heure_depart',
                'voyage.bus:id,immatriculation',
                'trajet:id,depart_id,arrivee_id',
                'trajet.depart:id,nom',
                'trajet.arrivee:id,nom',
            ])
                ->whereHas('voyage', function ($query) {
                    $query->where('date_voyage', '>=', Carbon::now()); // Voyages futurs uniquement
                })
                ->where('user_id', '=', $request->user()->id)
                ->get();

            // Vérifier si des voyages sont trouvés
            if ($tickets->isEmpty()) {
                return response()->json([
                    'message' => 'Aucune réservation de tickets a venir',
                ], 404);
            }

            return response()->json($tickets, 200);
        } catch (QueryException $e) {
            // Gestion des erreurs de requête (par exemple, problème de base de données)
            return response()->json([
                'error' => 'Erreur lors de la récupération des données.',
                'message' => $e->getMessage(),
            ], 500);
        } catch (ModelNotFoundException $e) {
            // Gestion d'une erreur spécifique si aucun modèle n'a été trouvé
            return response()->json([
                'error' => 'Modèle non trouvé.',
                'message' => $e->getMessage(),
            ], 404);
        } catch (Exception $e) {
            // Gestion de toutes les autres erreurs
            return response()->json([
                'error' => 'Une erreur interne s\'est produite.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    // Affiche les sieges reservés
    public function booked_places(Request $request)
    {
        try {
            // Validation des données de la requête
        $validator = Validator::make($request->all(), [
            'voyage_id' => 'required|exists:voyages,id'
        ]);

        // Si la validation échoue, retourner les erreurs
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $busId = Voyage::find($request->voyage_id)
        ->buses() // Accéder à la relation avec les bus via la table pivot
        ->first()
        ->id;


        $totalSeat = Bu::where('id', "=", $busId)
            ->pluck('places');

        $seatBooked = Ticket::where('voyage_id', '=', $request->voyage_id)->pluck('code_ticket');

        $totalSeatBooked = $seatBooked->count();

        $bookedSeatNumbers =  $bookedSeatNumbers = $seatBooked->implode(',');;

        return response()->json([
            'totalSeat' => $totalSeat,
            'bookedSeatNumbers' => $bookedSeatNumbers,
            'totalSeatBooked' => $totalSeatBooked
        ], 200);
        }catch (Exception $e) {
            return response()->json([
                'error' => "Une erreur est survenue lors du traitement.",
                'message' => $e->getMessage()
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
