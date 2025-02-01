<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoyageRequest;
use App\Models\Trajet;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\BuVoyage;
use App\Models\Escale;
use App\Models\Bus;
use App\Models\Ligne;
use Illuminate\Support\Facades\DB;

class VoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $voyages = Voyage::with('trajet')->get();
            return response()->json($voyages);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite au cours de la récupération des données."
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données entrantes
        $request->validate([
            'buses' => 'required|array',
            'buses.*' => 'exists:bus,id', // Vérifie que les bus existent dans la table 'bus'
            'ligne_id' => 'required|exists:liges,id',
            'heures' => 'required|array',
            'heures.*.trajet_id' => 'required|exists:trajets,id',
            'heures.*.heure_depart' => 'required|date_format:H:i',
            'heures.*.heure_arrivee' => 'required|date_format:H:i',
            'date_voyage' => 'required|date_format:Y-m-d',
        ]);

        // Démarrer une transaction DB
        // DB::beginTransaction();

        // try {
        //     // 1. Créer le voyage
        //     $voyage = Voyage::create([
        //         'date_voyage' => $request->date_voyage,
        //         'heure_depart' => $request->heures[0]['heure_depart'], // Tu pourrais choisir d'ajouter l'heure départ si nécessaire
        //         'ligne_id' => $request->ligne_id, // Associer la ligne au voyage
        //     ]);

        //     // 2. Insérer les bus pour ce voyage
        //     foreach ($request->buses as $busId) {
        //         BuVoyage::create([
        //             'bus_id' => $busId,
        //             'voyage_id' => $voyage->id,
        //         ]);
        //     }

        //     // 3. Insérer les trajets et escales avec les heures de départ et d'arrivée
        //     foreach ($request->heures as $heure) {
        //         $trajet = Trajet::find($heure['trajet_id']);
                
        //         // On récupère l'arrêt de départ et d'arrivée pour l'escale
        //         $departId = $trajet->depart_id;
        //         $arriveeId = $trajet->arrivee_id;

        //         // Création de l'escale
        //         Escale::create([
        //             'voyage_id' => $voyage->id,
        //             'arret_id' => $departId, // Arrêt de départ
        //             'heure_depart' => $heure['heure_depart'],
        //             'heure_arrivee' => $heure['heure_arrivee'],
        //             'places_disponibles' => 30, // Par exemple, définir des places par défaut ou gérer dynamiquement
        //         ]);

        //         // Création d'une escale pour l'arrêt d'arrivée, si nécessaire
        //         Escale::create([
        //             'voyage_id' => $voyage->id,
        //             'arret_id' => $arriveeId, // Arrêt d'arrivée
        //             'heure_depart' => $heure['heure_depart'], // Ou une autre logique si tu veux utiliser des heures différentes
        //             'heure_arrivee' => $heure['heure_arrivee'],
        //             'places_disponibles' => 30,
        //         ]);
        //     }

        //     // 4. Commit de la transaction si tout va bien
        //     DB::commit();

        //     return response()->json([
        //         'message' => 'Voyage créé avec succès!',
        //         'data' => $voyage,
        //     ], 201);

        // } catch (\Exception $e) {
        //     // Annuler la transaction en cas d'erreur
        //     DB::rollBack();
        //     return response()->json([
        //         'error' => 'Une erreur est survenue lors de la création du voyage.',
        //         'message' => $e->getMessage(),
        //     ], 500);
        //     print(e);

        // }
        return response()->json([
            'message' => 'Voyage créé avec succès!',
            'data' => $voyage,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $voyage = Voyage::with('trajet')->find($id);

        if (!$voyage) {
            return response()->json(['error' => 'Voyage introuvable !'], 404);
        }

        return response()->json($voyage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoyageRequest $request, string $id): JsonResponse
    {
        $voyage = Voyage::find($id);

        if (!$voyage) {
            return response()->json(['error' => 'Voyage introuvable !'], 404);
        }

        try {
            $voyage->update($request->validated());
            return response()->json([
                'msg' => 'Voyage mis à jour avec succès.',
                'voyage' => $voyage
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite lors de la mise à jour du voyage."
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $voyage = Voyage::find($id);

        if (!$voyage) {
            return response()->json(['error' => 'Voyage introuvable !'], 404);
        }

        try {
            $voyage->delete();
            return response()->json(['msg' => 'Voyage supprimé avec succès.']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite lors de la suppression du voyage."
            ], 500);
        }
    }
}
