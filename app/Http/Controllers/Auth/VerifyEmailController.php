<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    // public function __invoke(EmailVerificationRequest $request): JsonResponse
    // {
    //     if ($request->user()->hasVerifiedEmail()) {
    //         return response()->json(['msg' => "Votre email a déjà été vérifié."]);
    //     }

    //     if ($request->user()->markEmailAsVerified()) {
    //         event(new Verified($request->user()));
    //     }

    //     return response()->json(['Votre email a été vérifié avec succès']);
    // }

    public function store(Request $request) {

        try {
            // Validation des données de la requête
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'verification_code' => 'required|string',
        ]);

        // Si la validation échoue, retourner les erreurs
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }


        $user = User::where('email', $request->email)->first();


        if (!$user || !$user->isVerificationCodeValid($request->verification_code)) {
            return response()->json(['error' => 'Code de vérification invalide ou expiré'], 400);
        }

        $user->email_verified_at = now();
        $user->clearVerificationCode(); // Supprimez le code une fois vérifié
        $user->save();

        return response()->json(['msg' => 'Email vérifié avec succès.']);
        } catch (\Exception $e) {
            // Si une erreur se produit, retourner un message d'erreur
            return response()->json([
                'error' => "Oups! Une erreur est survenue lors de l'ajout du bus.",
                'message' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }
}
