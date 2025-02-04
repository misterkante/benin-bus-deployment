<?php

namespace App\Http\Controllers;
use App\Models\Arret;

use App\Models\Ligne;
use App\Models\Trajet;
use App\Models\ArretLigne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LigneController extends Controller
{

    /**
     * Crée une ligne et enregistre les trajets et les arrêts associés dans l'ordre.
     */
    public function createLigne(Request $request)
    {
        // Validation des paramètres reçus
        // $request->validate([
        //     'nom' => 'required|string|max:255',  // Le nom de la ligne
        //     'villes' => 'required|string',  // La chaîne de villes
        // ]);

        // Récupérer le nom de la ligne et la chaîne des villes
        $nomLigne = $request->input('nom');
        $villesString = $request->input('villes');

        // Découper la chaîne de villes en un tableau
        $villes = explode(' - ', $villesString);

        // Démarrer la transaction pour garantir l'intégrité des données
        DB::beginTransaction();

        try {
            // Enregistrer le nom de la ligne dans la table 'Ligne'
            $ligne = Ligne::create([
                'nom' => $nomLigne,
            ]);

            // Récupérer les IDs des arrêts (villes)
            $arrets = Arret::whereIn('nom', $villes)->get();

            // Enregistrer les arrêts dans la table ArretLigne avec l'ordre
            foreach ($arrets as $index => $arret) {
                ArretLigne::create([
                    'ligne_id' => $ligne->id,
                    'arret_id' => $arret->id,
                    'ordre' => $index + 1,  // L'ordre commence à 1
                ]);
            }

            // Enregistrer les trajets pour toutes les combinaisons de villes
            foreach ($arrets as $depart) {
                foreach ($arrets as $arrivee) {
                    if ($depart->id !== $arrivee->id) {  // On ne crée pas de trajet pour une ville avec elle-même
                        // Créer un trajet entre depart et arrivee
                        Trajet::create([
                            'ligne_id' => $ligne->id,
                            'depart_id' => $depart->id,
                            'arrivee_id' => $arrivee->id,
                            'duree' => 0,  // À définir selon ta logique
                            'prix' => 0,   // À définir selon ta logique
                        ]);
                    }
                }
            }

            // Commit de la transaction
            DB::commit();

            // Retourner une réponse de succès
            return response()->json([
                'message' => 'Ligne, arrêts et trajets créés avec succès.',
                'ligne' => $ligne,
            ], 200);

        } catch (\Exception $e) {
            // Si une erreur se produit, annuler la transaction
            DB::rollBack();

            // Retourner une erreur si quelque chose échoue
            return response()->json([
                'error' => 'Erreur lors de la création de la ligne, des arrêts et des trajets.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $lignes = Ligne::with('arrets')->get(); // Inclure les arrêts associés
    return response()->json($lignes, 200);
}

    public function allLignes()
    {
        $lignes = Ligne::all();
        return response()->json($lignes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
    ]);

    $ligne = Ligne::create($validated);

    return response()->json([
        'msg' => 'Ligne créée avec succès',
        'ligne' => $ligne
    ], 201);
}


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $ligne = Ligne::with('arrets')->find($id);

    if (!$ligne) {
        return response()->json(['msg' => 'Ligne non trouvée'], 404);
    }

    return response()->json($ligne, 200);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
    ]);

    $ligne = Ligne::find($id);

    if (!$ligne) {
        return response()->json(['msg' => 'Ligne non trouvée'], 404);
    }

    $ligne->update($validated);

    return response()->json([
        'msg' => 'Ligne mise à jour avec succès',
        'ligne' => $ligne
    ], 200);
}


    /**
     * Remove the specified resource from storage.
     */public function destroy($id)
{
    $ligne = Ligne::find($id);

    if (!$ligne) {
        return response()->json(['msg' => 'Ligne non trouvée'], 404);
    }

    $ligne->delete();

    return response()->json(['msg' => 'Ligne supprimée avec succès'], 200);
}

}
