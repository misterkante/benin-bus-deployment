<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ArretController;
use App\Http\Controllers\LigneController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TrajetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(
    function () {

        //Récupérer l'utilisateur actuellement connecté
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

    //     // Mettre à jour le mot de passe de l'utilisateur connecté
    //     Route::put('/profil/password', [ProfilController::class, 'changer_mot_de_passe']);
    //
    }
);
Route::middleware('auth:sanctum')->put('/profil/password', [ProfilController::class, 'changer_mot_de_passe']);

Route::get('/test', function (Request $request) {
    return response()->json(User::all());
});

// Routes pour les différentrs controllers
Route::apiResource('voyages', VoyageController::class);
Route::apiResource('bus', BusController::class);
//Route::apiResource('profil', ProfilController::class);
Route::apiResource('ligne', LigneController::class);
Route::apiResource('arret', controller: ArretController::class);
Route::apiResource('trajet', TrajetController::class);

require __DIR__ . '/auth.php';
