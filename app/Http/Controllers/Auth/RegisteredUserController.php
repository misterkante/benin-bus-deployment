<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Mail\VerificationMail;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\RegisterRequest;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): JsonResponse
    {

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assignation du role à l'utilisateur
        $user->assignRole('client');

        $user->generateVerificationCode();

        try {
            Mail::to($user->email)->send(new VerificationMail($user));
        } catch (Exception $e) {
            return response()->json(["error" => $e]);
        }


        // Evenement pour l'envoi de l'email
        //event(new Registered($user));

        return response()->json(['msg' => "Votre compte a été créé avec succès"]);
    }
}
