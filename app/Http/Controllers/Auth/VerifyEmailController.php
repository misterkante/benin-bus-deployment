<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
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

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'verification_code' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !$user->isVerificationCodeValid($request->code)) {
            return response()->json(['error' => 'Code de vérification invalide ou expiré'], 400);
        }

        $user->email_verified_at = now();
        $user->clearVerificationCode(); // Supprimez le code une fois vérifié
        $user->save();

        return response()->json(['msg' => 'Email vérifié avec succès.']);
    }
}
