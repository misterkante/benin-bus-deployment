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
            $table->bigInteger('code_ticket');
            $table->decimal('prix', 8, 2);
            $table->integer('siege');
            $table->enum('statut', ['réservé', 'annulé', 'utilisé']);

            //clés étrangères
            $table->foreignId('depart_id')->constrained('arrets');
            $table->foreignId('arrivee_id')->constrained('arrets');
            
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
