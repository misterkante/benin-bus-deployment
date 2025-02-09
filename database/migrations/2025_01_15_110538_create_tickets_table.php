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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('code_ticket');
            $table->decimal('prix', 8, 2);
            $table->string('siege');
            $table->enum('statut', ['réservé', 'annulé', 'utilisé'])->default('réservé');

            //clés étrangères
            $table->foreignId('bus_id')->constrained('bus');
            $table->foreignId('trajet_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('voyage_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
