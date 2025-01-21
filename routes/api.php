<?php

use App\Http\Controllers\ArretController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\LigneController;
use App\Http\Controllers\ProfilController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test', function (Request $request) {
    $lignes =
        [
            [
                'nom' => 'Cotonou - Bohicon - Dassa-Zoumè - Parakou - Malanville',
                'compagnie_id' => 1,
                'distance_km' => 800,
            ],
            [
                'nom' => 'Cotonou - Porto-Novo - Igolo (frontière Nigéria)',
                'compagnie_id' => 1,
                'distance_km' => 150,
            ],
            [
                'nom' => 'Comè - Lokossa - Athiémé - Djakotomey',
                'compagnie_id' => 1,
                'distance_km' => 200,
            ],
            [
                'nom' => 'Parakou - Kandi - Malanville',
                'compagnie_id' => 1,
                'distance_km' => 450,
            ],
            [
                'nom' =>  'Allada - Ouidah - Grand-Popo - Hillacondji (frontière Togo)',
                'compagnie_id' => 1,
                'distance_km' => 120,
            ],
            [
                'nom' => 'Cotonou - Sèmè-Kpodji',
                'compagnie_id' => 1,
                'distance_km' => 50,
            ],
            [
                'nom' => 'Bohicon - Abomey - Covè - Za-Kpota',
                'compagnie_id' => 1,
                'distance_km' => 75,
            ],
            [
                'nom' => 'Abomey-Calavi - Godomey - Cotonou',
                'compagnie_id' => 1,
                'distance_km' => 20,
            ],
            [
                'nom' => 'Djougou - Natitingou - Porga',
                'compagnie_id' => 1,
                'distance_km' => 300,
            ],
            [
                'nom' => 'Parakou - Tchaourou - Bassila',
                'compagnie_id' => 1,
                'distance_km' => 220,
            ],
            [
                'nom' => 'Savalou - Glazoué - Bantè',
                'compagnie_id' => 1,
                'distance_km' => 95,
            ],
            [
                'nom' => 'Nikki - Kalalé - Ségbana',
                'compagnie_id' => 1,
                'distance_km' => 180,
            ],
        ];
            dd($lignes);
        });
// Routes pour les différentrs controllers
Route::apiResource('voyages', VoyageController::class);
Route::apiResource('bus', BusController::class);
Route::apiResource('profil', ProfilController::class);
Route::apiResource('ligne', LigneController::class);
Route::apiResource('arret', ArretController::class);
require __DIR__.'/auth.php';
