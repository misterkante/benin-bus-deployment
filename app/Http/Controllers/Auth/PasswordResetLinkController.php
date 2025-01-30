<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Exceptions\HttpResponseException;

class PasswordResetLinkController extends Controller
{
    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        // Validation des données de la requête
        $request->validate([
            "email" => ['required','email', 'exists:users,email'],
        ]);


        //Récupérer l'utilisateur et regenerer le code
        $user = User::where('email', $request->input('email'))->first();
        $user->generateVerificationCode();

        // Envoi d'email
        try {
            Mail::to($user->email)->send(new VerificationMail($user));
        }
        catch (Exception $e) {
            return response()->json([
                "error" => "Le mail de vérification n'a pas pu être envoyé.",
            ]);
        }
        return response()->json(['msg' => 'Un mail de vérification vous a été envoyé. Veuillez consulter vos mails.']);

    }
}
