<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EscaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $escales = Escale::all();
            return response()->json($escales);
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Oups! Une erreur lors de la recuperation des escales."
            ], 500);
        }
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
