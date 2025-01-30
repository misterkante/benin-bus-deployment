<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('escales', function (Blueprint $table) {
            $table->id();
            $table->time('heure_depart');
            $table->time('heure_arrivee');
            $table->integer('places_disponibles')->nullable();
            // Clés étrangères
            $table->foreignId('arret_id')->constrained();
            $table->foreignId('voyage_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escales');
    }
};
