<?php

namespace App\Http\Controllers;


use App\Models\Arret;
use Illuminate\Http\Request;

class ArretController extends Controller
{
    public function index()
    {
        return Arret::all();
    }

    public function store(Request $request)
    {

        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'longitude' => 'nullable|numeric',
                'latitude' => 'nullable|numeric',
            ]);


            $arret = Arret::create($validated);
            return response()->json($arret, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur s'est produite lors de la création de l'arret.",
                'details' => $e,
            ], 500);
        }
    }

    public function show($id)
    {
        $arret = Arret::find($id);
        if (!$arret) {
            return response()->json(['message' => 'Arrêt non trouvé'], 404);
        }
        return $arret;
    }

    public function update(Request $request, $id)
    {
        $arret = Arret::find($id);
        if (!$arret) {
            return response()->json(['message' => 'Arrêt non trouvé'], 404);
        }

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
        ]);

        $arret->update($validated);
        return response()->json($arret, 200);
    }

    public function destroy($id)
    {
        $arret = Arret::find($id);
        if (!$arret) {
            return response()->json(['message' => 'Arrêt non trouvé'], 404);
        }

        $arret->delete();
        return response()->json(['message' => 'Arrêt supprimé'], 200);
    }
}
