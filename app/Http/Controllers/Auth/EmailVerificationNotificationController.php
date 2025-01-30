<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

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
        //Récupérer l'utilisateur et regenerer le code
        $user = User::where('email', $request->input('email'))->first();
        $user->generateVerificationCode();

        // Envoi d'email
        try {
            Mail::to($request->user()->email)->send(new VerificationMail($request->user()));
        } catch (Exception $e) {
            return response()->json([
                "error" => "Le mail de vérification n'a pas pu être envoyé.",
            ]);
        }

        return response()->json(['msg' => 'Un mail de vérification vous a été envoyé. Veuillez consulter vos mails.']);
    }
}
