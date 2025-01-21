<?php

namespace App\Http\Controllers;
use App\Models\Ligne;

use Illuminate\Http\Request;

class LigneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $lignes = Ligne::with('arrets')->get(); // Inclure les arrêts associés
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
