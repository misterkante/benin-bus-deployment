<?php

namespace App\Http\Controllers;

use App\Models\ArretLigne;
use Illuminate\Http\Request;

class ArretLigneController extends Controller
{
    public function index()
    {
        return ArretLigne::with(['arret', 'ligne'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ligne_id' => 'required|exists:lignes,id',
            'arret_id' => 'required|exists:arrets,id',
            'ordre' => 'required|integer',
        ]);

        $arretLigne = ArretLigne::create($validated);
        return response()->json($arretLigne, 201);
    }

    public function show($id)
    {
        $arretLigne = ArretLigne::with(['arret', 'ligne'])->find($id);
        if (!$arretLigne) {
            return response()->json(['message' => 'Association non trouvée'], 404);
        }
        return $arretLigne;
    }

    public function update(Request $request, $id)
    {
        $arretLigne = ArretLigne::find($id);
        if (!$arretLigne) {
            return response()->json(['message' => 'Association non trouvée'], 404);
        }

        $validated = $request->validate([
            'ligne_id' => 'required|exists:lignes,id',
            'arret_id' => 'required|exists:arrets,id',
            'ordre' => 'required|integer',
        ]);

        $arretLigne->update($validated);
        return response()->json($arretLigne, 200);
    }

    public function destroy($id)
    {
        $arretLigne = ArretLigne::find($id);
        if (!$arretLigne) {
            return response()->json(['message' => 'Association non trouvée'], 404);
        }

        $arretLigne->delete();
        return response()->json(['message' => 'Association supprimée'], 200);
    }
}
