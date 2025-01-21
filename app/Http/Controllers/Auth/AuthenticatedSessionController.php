<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        // Authentification de l'email et du mot de passe et connexion
        $request->authenticate();

        // Création d'une session pour l'utilisateur connecté
        $request->session()->regenerate();

        // Création d'un Bearer Token à prendre en compte dans les requêtes vers les routes protégées
        $token = $request->user()->createToken('bearer-token');

        return response()->json([
            'msg' => "Connecté avec succès !",
            'user' => $request->user(),
            'role' => $request->user()->roles,
            'token' => $token->plainTextToken,
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();

        // Supprimer le token créé pour l'utilisateur
        $request->user()->tokens()->delete();

        // Destruction de la session de l'utilisateur
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Pour vérifier que l'utilisateur a bien été déconnecté
        $user = Auth::user();

        return response()->json([
            'msg' => 'Déconnecté avec succès !',
            'user' => $user
        ]);
    }
}
