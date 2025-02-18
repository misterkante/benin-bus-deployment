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
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->integer('duree'); //en heures
            $table->decimal('prix', 8,2);
            //clés étrangères
            $table->foreignId('depart_id')->constrained('arrets');
            $table->foreignId('arrivee_id')->constrained('arrets');
            $table->foreignId('ligne_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajets');
    }
};
