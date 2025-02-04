<?php

namespace App\Http\Controllers;

use App\Models\Bu;
use App\Models\User;
use App\Models\Voyage;
use App\Models\Paiement;
use Illuminate\Http\Request;

class DashboardDataController extends Controller
{
    public function index() {
        // Nombre d'urtilisateurs
        $users = User::all()->count();

        // Nombre de bus enregistrés,
        $bus = Bu::all()->count();

        // Nombre de voyages publiés,
        $voyages = Voyage::all()->count();

        // Profit total généré,
        $profit = Paiement::all()->sum('montant');

        return response()->json([
            'users' => $users,
            'bus' => $bus,
            'voyages' => $voyages,
            'profit_total' => $profit,
        ]);
    }
}
