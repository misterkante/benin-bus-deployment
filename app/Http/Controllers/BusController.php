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
    public function store(BusRequest $request): JsonResponse
    {
        try {
            $bus = Bu::create($request->validated());
            return response()->json([
                'msg' => 'Bus créé avec succès.',
                'bus' => $bus
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite lors de la création du bus."
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
