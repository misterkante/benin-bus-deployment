<?php
namespace App\Http\Controllers;

use App\Models\Trajet;
use App\Models\ArretLigne;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    // Générer tous les trajets possibles pour une ligne
    public function generateTrajets($ligneId)
    {
        $arrets = ArretLigne::where('ligne_id', $ligneId)
                            ->orderBy('ordre')
                            ->pluck('arret_id')
                            ->toArray();

        $trajects = [];
        foreach ($arrets as $i => $departId) {
            for ($j = $i + 1; $j < count($arrets); $j++) {
                $trajects[] = [
                    'depart_id' => $departId,
                    'arrive_id' => $arrets[$j],
                    'ligne_id' => $ligneId,
                ];
            }
        }

        Trajet::insert($trajects);

        return response()->json(['message' => 'Trajets générés avec succès'], 201);
    }

    // Liste les trajets d'une ligne
    public function index()
    {
        $trajets = Trajet::all();

        return response()->json($trajets, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'depart_id' => 'required|exists:arrets,id',
            'arrive_id' => 'required|exists:arrets,id',
            'ligne_id' => 'required|exists:lignes,id',
        ]);

        $trajet = Trajet::create($validated);
        return response()->json($trajet, 201);
    }

    public function show($id)
    {
        $trajet = Trajet::with(['depart', 'arrivee', 'ligne'])->find($id);
        if (!$trajet) {
            return response()->json(['message' => 'Trajet non trouvé'], 404);
        }
        return $trajet;
    }

    public function update(Request $request, $id)
    {
        $trajet = Trajet::find($id);
        if (!$trajet) {
            return response()->json(['message' => 'Trajet non trouvé'], 404);
        }

        $validated = $request->validate([
            'depart_id' => 'required|exists:arrets,id',
            'arrive_id' => 'required|exists:arrets,id',
            'ligne_id' => 'required|exists:lignes,id',
        ]);

        $trajet->update($validated);
        return response()->json($trajet, 200);
    }

    public function destroy($id)
    {
        $trajet = Trajet::find($id);
        if (!$trajet) {
            return response()->json(['message' => 'Trajet non trouvé'], 404);
        }

        $trajet->delete();
        return response()->json(['message' => 'Trajet supprimé'], 200);
    }


}


