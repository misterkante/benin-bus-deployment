<?php
namespace App\Http\Controllers;

use App\Models\Trajet;
use App\Models\ArretLigne;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    public function getTrajetsWithZeroPrice()
    {
        // Récupérer les trajets avec un prix égal à zéro
        $trajets = Trajet::where('prix', 0)->get();

        // Retourner la réponse sous forme de JSON
        return response()->json($trajets);
    }


    // Générer tous les trajets possibles pour une ligne
    public function generateTrajets($ligneId)
    {
        $arrets = ArretLigne::where('ligne_id', $ligneId)
                            ->orderBy('ordre')
                            ->pluck('arret_id')
                            ->toArray();

        $trajects = [];
        foreach ($arrets as $i => $departId) {
            for ($j = $i + 1; $j < count($arrets); $j++) {
                $trajects[] = [
                    'depart_id' => $departId,
                    'arrive_id' => $arrets[$j],
                    'ligne_id' => $ligneId,
                ];
            }
        }

        Trajet::insert($trajects);

        return response()->json(['message' => 'Trajets générés avec succès'], 201);
    }
    // app/Http/Controllers/TrajetController.php

    public function getTrajetsForLigne(Request $request)
    {
        $ligneId = $request->query('ligne_id');  // Récupérer l'ID de la ligne depuis la requête

        // Assurez-vous que l'ID de la ligne est valide
        if (!$ligneId) {
            return response()->json(['error' => 'Ligne ID est requis'], 400);
        }

        // Récupérer les trajets associés à la ligne
        $trajets = Trajet::where('ligne_id',$ligneId)-> with(['depart' => function($query) {
            $query->select('id', 'nom', 'departement', 'pays', 'longitude', 'latitude'); // Sélectionner les colonnes nécessaires pour l'arrêt de départ
        }, 'arrivee' => function($query) {
            $query->select('id', 'nom', 'departement', 'pays', 'longitude', 'latitude'); // Sélectionner les colonnes nécessaires pour l'arrêt d'arrivée
        }])
        ->get();

        // Retourner les trajets sous forme de JSON
        return response()->json($trajets);
    }


    // Liste les trajets 
    public function index()
    {
        $trajets = Trajet::all();


        return response()->json($trajets, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'depart_id' => 'required|exists:arrets,id',
            'arrive_id' => 'required|exists:arrets,id',
            'ligne_id' => 'required|exists:lignes,id',
        ]);

        $trajet = Trajet::create($validated);
        return response()->json($trajet, 201);
    }

    public function show($id)
    {
        $trajet = Trajet::with(['depart', 'arrivee', 'ligne'])->find($id);
        if (!$trajet) {
            return response()->json(['message' => 'Trajet non trouvé'], 404);
        }
        return $trajet;
    }

    public function update(Request $request, $id)
    {
        $trajet = Trajet::find($id);
        if (!$trajet) {
            return response()->json(['message' => 'Trajet non trouvé'], 404);
        }

        $validated = $request->validate([
            'depart_id' => 'required|exists:arrets,id',
            'arrive_id' => 'required|exists:arrets,id',
            'ligne_id' => 'required|exists:lignes,id',
        ]);

        $trajet->update($validated);
        return response()->json($trajet, 200);
    }

    public function destroy($id)
    {
        $trajet = Trajet::find($id);
        if (!$trajet) {
            return response()->json(['message' => 'Trajet non trouvé'], 404);
        }

        $trajet->delete();
        return response()->json(['message' => 'Trajet supprimé'], 200);
    }


    


}


