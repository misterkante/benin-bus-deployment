<?php

namespace App\Http\Controllers;

use App\Models\Bu;
use Illuminate\Http\Request;
use App\Http\Requests\BusRequest;
use Illuminate\Http\JsonResponse;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $bus = Bu::with(['user:id,nom_compagnie'])->get();
            return response()->json($bus);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite au cours de la récupération des données."
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // Validation des données de la requête
        $validator = Validator::make($request->all(), [
            'immatriculation' => 'required',
            'places' => 'required',
            'statut' => 'required',
        ]);

        // Si la validation échoue, retourner les erreurs
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }

        // Enregistrer les données du bus
        try {
            $bus = new Bus();
            $bus->immatriculation = $request->input('immatriculation');
            $bus->places = $request->input('places');
            $bus->statut = $request->input('statut');
            $bus->save(); // Sauvegarde dans la base de données

            return response()->json([
                'msg' => 'Bus ajouté avec succès.',
                'bus' => $bus // Vous pouvez retourner les informations du bus si vous le souhaitez
            ], 201); // 201 Created
        } catch (\Exception $e) {
            // Si une erreur se produit, retourner un message d'erreur
            return response()->json([
                'error' => "Oups! Une erreur est survenue lors de l'ajout du bus.",
                'message' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $bus = Bu::with('voyages')->find($id);

        if (!$bus) {
            return response()->json(['error' => 'Bus introuvable !'], 404);
        }

        return response()->json($bus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusRequest $request, string $id): JsonResponse
    {
        $bus = Bu::find($id);

        if (!$bus) {
            return response()->json(['error' => 'Bus introuvable !'], 404);
        }

        try {
            $bus->update($request->validated());
            return response()->json([
                'msg' => 'Bus mis à jour avec succès.',
                'bus' => $bus
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite lors de la mise à jour du bus."
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $bus = Bu::find($id);

        if (!$bus) {
            return response()->json(['error' => 'Bus introuvable !'], 404);
        }

        try {
            $bus->delete();
            return response()->json(['msg' => 'Bus supprimé avec succès.']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite lors de la suppression du bus."
            ], 500);
        }
    }
}
