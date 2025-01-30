<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class NewPasswordController extends Controller
{
    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): JsonResponse
    // {
    //     try {
    //         $request->validate([
    //             'code' => ['required'],
    //             'email' => ['required', 'email'],
    //             'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         ]);


    //         // Here we will attempt to reset the user's password. If it is successful we
    //         // will update the password on an actual user model and persist it to the
    //         // database. Otherwise we will parse the error and return the response.
    //         $status = Password::reset(
    //             $request->only('email', 'password', 'password_confirmation', 'token'),
    //             function ($user) use ($request) {
    //                 $user->forceFill([
    //                     'password' => Hash::make($request->password),
    //                     'remember_token' => Str::random(60),
    //                 ])->save();

    //                 event(new PasswordReset($user));
    //             }
    //         );

    //         if ($status != Password::PASSWORD_RESET) {
    //             throw new HttpResponseException(response()->json([
    //                 'error' => [__($status)],
    //             ]));
    //         }

    //         return response()->json(['msg' => __($status)]);
    //     } catch (ValidationException $e) {
    //         return response()->json([
    //             'error' => $e->errors(),
    //         ], 422);
    //     }
    // }

    public function store(Request $request): JsonResponse
    {
        try {
            // ✅ Validation des données
            $request->validate([
                'email' => ['required', 'email', 'exists:users,email'],
                'verification_code' => ['required'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            // ✅ Recherche de l'utilisateur avec l'email et le code
            $user = User::where('email', $request->email)->first();

            if (!$user || !$user->isVerificationCodeValid($request->verification_code)) {
                throw new HttpResponseException(response()->json([
                    'error' => 'Code de vérification invalide ou expiré.'
                ], 422));
            }

            // ✅ Mettre à jour le mot de passe
            $user->forceFill([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
                'verification_code' => null, // Supprime le code après usage
                'verification_code_expires_at' => null,
            ])->save();

            // ✅ Déclencher l'événement de réinitialisation
            event(new PasswordReset($user));

            return response()->json([
                'msg' => 'Mot de passe réinitialisé avec succès.'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors(),
            ], 422);
        }
    }
}
