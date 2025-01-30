<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function update_password(Request $request)
    {
        try {
            // Valider les champs
            $validated = $request->validate([
                'current_password' => 'required',
                'password' => 'required|confirmed|min:8',
            ]);

            // Récupérer l'utilisateur actuellement authentifié
            $user = $request->user();

            // Vérification du mot de passe actuel
            if (!Hash::check($request->current_password, $user->password)) {
                throw new HttpResponseException(
                    response()->json([
                        'error' => 'Le mot de passe actuel est incorrect.',
                    ])
                );
            }

            // Mise à jour du mot de passe
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);

            return response()->json([
                'msg' => 'Mot de passe modifié avec succès.'
            ]);
        } catch (ValidationException $error) {

                return response()->json([
                    'error' => $error->errors()
                ]);

            // return response()->json([
            //     'error' => "Une erreur s'est produite"
            // ]);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
