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
        Schema::create('arret_lignes', function (Blueprint $table) {
            $table->id();
            $table->integer('ordre');
            //clés étrangères
            $table->foreignId('ligne_id')->constrained();
            $table->foreignId('arret_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arret_lignes');
    }
};
