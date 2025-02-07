<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Bus;
use App\Models\Ligne;
use App\Models\Escale;
use App\Models\Trajet;
use App\Models\Voyage;
use App\Models\BuVoyage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoyageRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\HttpExceptions\HttpResponseException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VoyageController extends Controller
{
    /**
     * Rechercher un voyage
     * Arguments : date , depart_id et arrive_id
     */
    public function find_my_travel(Request $request)
    {
        try {
            // Validation des champs
            $validator = Validator::make($request->all(), [
                'depart_id' => 'required|exists:arrets,id',
                'arrivee_id' => 'required|exists:arrets,id',
                'date' => 'nullable|date_format:Y-m-d',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Récupérer les IDs des lignes des trajets concernés
            $trajetsId = Trajet::where('depart_id', $request->depart_id)
                ->where('arrivee_id', $request->arrivee_id)
                ->pluck('ligne_id'); // Récupère uniquement les IDs

            if ($trajetsId->isEmpty()) {
                return response()->json(['message' => 'Aucun résultat trouvé'], 404);
            }

            // Recherche des voyages correspondants
            $voyages = Voyage::whereIn('ligne_id', $trajetsId);

            // Filtrer par date si fournie
            if ($request->has('date')) {
                $voyages->whereDate('date_voyage', $request->date);
            }

            $voyages = $voyages->get();

            if ($voyages->isEmpty()) {
                return response()->json(['message' => 'Aucun voyage trouvé'], 404);
            }

            return response()->json($voyages);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Une erreur est survenue',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $voyages = Voyage::all();
            return response()->json($voyages);
        } catch (Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite au cours de la récupération des données."
            ], 500);
        }
    }


    public function nextVoyages(Request $request)
    {
        try {
            // Récupérer les voyages dont la date de départ est aujourd'hui ou dans le futur
            $voyages = Voyage::with(['ligne.trajets.depart', 'ligne.trajets.arrivee', 'bus'])
                ->where('date_voyage', '>=', Carbon::now())
                ->get();

            // Vérifier si des voyages sont trouvés
            if ($voyages->isEmpty()) {
                return response()->json([
                    'message' => 'Aucun voyage trouvé pour la date spécifiée.',
                ], 404);
            }

            // Retourner les voyages avec leurs trajets, arrêts et bus associés
            return response()->json($voyages, 200);
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données entrantes
        // $request->validate([
        //     'buses' => 'required|array',
        //     'buses.*' => 'exists:bus,id', // Vérifie que les bus existent dans la table 'bus'
        //     'ligne_id' => 'required|exists:liges,id',
        //     'heures' => 'required|array',
        //     'heures.*.trajet_id' => 'required|exists:trajets,id',
        //     'heures.*.heure_depart' => 'required|date_format:H:i',
        //     'heures.*.heure_arrivee' => 'required|date_format:H:i',
        //     'date_voyage' => 'required|date_format:Y-m-d',
        // ]);

        // Démarrer une transaction DB
        DB::beginTransaction();

        try {
            // 1. Créer le voyage
            $voyage = Voyage::create([
                'date_voyage' => $request->date_voyage,
                'heure_depart' => $request->heures[0]["heure_depart"], // Tu pourrais choisir d'ajouter l'heure départ si nécessaire
                'ligne_id' => $request->ligne_id, // Associer la ligne au voyage
            ]);

            // 2. Insérer les bus pour ce voyage
            foreach ($request->buses as $busId) {
                BuVoyage::create([
                    'bus_id' => $busId,
                    'voyage_id' => $voyage->id,
                ]);
            }

            // 3. Insérer les trajets et escales avec les heures de départ et d'arrivée
            foreach ($request->heures as $heure) {
                $trajet = Trajet::find($heure['trajet_id']);

                // On récupère l'arrêt de départ et d'arrivée pour l'escale
                $departId = $trajet->depart_id;
                $arriveeId = $trajet->arrivee_id;

                // Création de l'escale
                Escale::create([
                    'voyage_id' => $voyage->id,
                    'arret_id' => $departId, // Arrêt de départ
                    'heure_depart' => $heure['heure_depart'],
                    'heure_arrivee' => $heure['heure_arrivee'],
                    'places_disponibles' => 30, // Par exemple, définir des places par défaut ou gérer dynamiquement
                ]);

                // Création d'une escale pour l'arrêt d'arrivée, si nécessaire
                Escale::create([
                    'voyage_id' => $voyage->id,
                    'arret_id' => $arriveeId, // Arrêt d'arrivée
                    'heure_depart' => $heure['heure_depart'], // Ou une autre logique si tu veux utiliser des heures différentes
                    'heure_arrivee' => $heure['heure_arrivee'],
                    'places_disponibles' => 30,
                ]);
            }

            // 4. Commit de la transaction si tout va bien
            DB::commit();

            return response()->json([
                'message' => 'Voyage créé avec succès!',
                'data' => $voyage,
            ], 201);
        } catch (Exception $e) {
            // Annuler la transaction en cas d'erreur
            DB::rollBack();
            return response()->json([
                'error' => 'Une erreur est survenue lors de la création du voyage.',
                'message' => $e->getMessage(),
            ], 500);
            print($e);
        }
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
        } catch (Exception $e) {
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
        } catch (Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite lors de la suppression du voyage."
            ], 500);
        }
    }
}
