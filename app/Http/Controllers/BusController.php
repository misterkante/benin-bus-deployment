<?php

namespace App\Http\Controllers;

use App\Models\Bu;
use Illuminate\Http\Request;
use App\Http\Requests\BusRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $bus = Bu::all();
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
    // Validation des données avec gestion d'erreur personnalisée
    $validator = Validator::make($request->all(), [
        'immatriculation' => 'required|string',
        'places' => ['required', 'regex:/^\d+$/', function ($attribute, $value, $fail) {
            if (((int) $value) % 2 !== 0) {
                $fail("Le nombre de places doit être un nombre pair.");
            }
        }],
        'statut' => 'required|string',
    ]);

    // Si la validation échoue, retourner une réponse JSON 422
    if ($validator->fails()) {
        return response()->json([
            'message' => 'Erreur de validation',
            'errors' => $validator->errors()
        ], 422);
    }

    try {
        // Création du bus
        $bus = Bu::create([
            'immatriculation' => $request->input('immatriculation'),
            'places' => (int) $request->input('places'), // Conversion en entier
            'statut' => $request->input('statut'),
            'compagnie_id' => 1,
        ]);

        return response()->json([
            'msg' => 'Bus ajouté avec succès.',
            'bus' => $bus
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'error' => "Oups! Une erreur est survenue lors de l'ajout du bus.",
            'message' => $e->getMessage()
        ], 500);
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
