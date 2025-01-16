<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoyageRequest;
use App\Models\Trajet;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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
    public function store(VoyageRequest $request): JsonResponse
    {
        try {
            $voyage = Voyage::create($request->validated());
            return response()->json([
                'msg' => 'Voyage créé avec succès.',
                'voyage' => $voyage
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite lors de la création du voyage."
            ], 500);
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
