<?php

namespace App\Http\Controllers;


use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Liste tous les tickets
    public function index()
    {
        $tickets = Ticket::with(['trajet.depart', 'trajet.arrivee'])->get();
        return response()->json($tickets, 200);
    }

    // Crée un ticket
    public function store(Request $request)
    {
        $validated = $request->validate([
            'voyage_id' => 'required|exists:voyages,id',
            'user_id' => 'required|exists:users,id',
            'depart_id' => 'required|exists:arrets,id',
            'arrive_id' => 'required|exists:arrets,id',
            'prix' => 'required|numeric',
        ]);

        $ticket = Ticket::create($validated);
        return response()->json([
            'message' => 'Ticket créé avec succès',
            'ticket' => $ticket
        ], 201);
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

