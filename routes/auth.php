<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function () {
    //-> Enregistrement d'utilisateur
    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest')
        ->name('register');

    //-> Connexion d'utilisateur
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('web')
        ->name('login');

    //-> Demande de code de verification pour modification de mot de passe
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest')
        ->name('password.email');
    //-> Modifification du mot de passe
    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest')
        ->name('password.store');


    //->Vérification d'email
    Route::post('/verify-email', [VerifyEmailController::class, 'store'])
        ->middleware(['auth:sanctum', 'throttle:6,1'])
        ->name('verification.verify');
    //-> Demande de renvoi d'email de verification
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['throttle:6,1', 'auth:sanctum']) //rappel d'ajout du middleware auth et de correction du controller en production
        ->name('verification.send');


    //->Déconnexion
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware(['auth:sanctum'])
        ->name('logout');
});
