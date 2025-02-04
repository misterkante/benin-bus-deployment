<?php

use App\Http\Controllers\TicketController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ArretController;
use App\Http\Controllers\LigneController;
use App\Http\Controllers\EscaleController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\DashboardDataController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Routes pour l'authentification
require __DIR__ . '/auth.php';


// Routes nécessitant d'être connecté
Route::middleware(['auth:sanctum'])->group(function () {

    /**
     * Gestion de l'utilisateur connecté
     */
    //-> récupérer l'utilisateur connecté
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    //-> changer le mot de passe
    Route::put('/profil/password', [ProfilController::class, 'update_password']);

});



/**
 * Gestion des lignes
 */
Route::apiResource('ligne', LigneController::class);

//-> récupérer toutes les lignes sans les arrets
Route::get('/getAllLines', [LigneController::class, 'allLignes']);

//-> créer une ligne
Route::post('/ligneAndTrajets', [LigneController::class, 'createLigne']);

//-> récupérer les trajets de la ligne créée
Route::get('/trajets-zero-prix', [TrajetController::class, 'getTrajetsWithZeroPrice']);



/**
 * Gestion  des arrets
 */
Route::apiResource('arret', controller: ArretController::class);



/**
 * Gestion des stations
 */



/**
 * Gestion des trajets
 */
Route::apiResource('trajet', TrajetController::class);

//-> Mettre à jour les prix de plusieurs trajets
Route::post('/soumettre-trajets', [TrajetController::class, 'updatePrix']);

//-> Récupérer les trajets d'une ligne
Route::get('/lignesDuTrajet'/*{id}'*/, [TrajetController::class, 'getTrajetsForLigne']);

Route::get('/next-voyages',[VoyageController::class, 'nextVoyages']);


/**
 * Gestion des voyages
 */
Route::apiResource('voyages', VoyageController::class);

/**
 * Gestion des escales de voyage
 */
Route::apiResource('escale', EscaleController::class);

/**
 * Gestion des bus
 */
Route::apiResource('bus', BusController::class);


/**
 * Gestion des tickets de voyage
 */
Route::apiResource('ticket', TicketController::class);


/**
 * Gestion de(s) utilisateurs(s)
 */
//-> récupérer tous les utilisateurs
Route::get('/user', function (Request $request) {
    return response()->json(User::all());
});

/**
 * Route(s) pour les statistiques
 */
Route::get('/statistics', [DashboardDataController::class, 'index']);
