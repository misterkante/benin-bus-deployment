<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): JsonResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['msg' => "Votre email a déjà été vérifié."]);
        }

        // Envoi de l'email de vérification
        $request->user()->sendEmailVerificationNotification();

        return response()->json(['msg' => 'Un lien de vérification vous a été envoyé. Veuillez consulter vos mails.']);
    }
}
