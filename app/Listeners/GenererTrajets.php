<?php

namespace App\Listeners;

use App\Models\Ligne;
use App\Models\Trajet;
use App\Events\LigneCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenererTrajets
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LigneCreated $event): void
    {
        // Récupérer la ligne à partir de la variable ajoutée au constructeur de l'evenement
        $ligne = $event->ligne;

        // Récupérer les arrêts associés à la ligne
        $arrets = $ligne->arrets()->orderBy('ordre')->get();

        // Générer toutes les combinaisons possibles
        for ($i = 0; $i < count($arrets) - 1; $i++) {
            for ($j = $i + 1; $j < count($arrets); $j++) {
                $trajet = Trajet::create([
                    'ligne_id' => $ligne->id,
                    'arret_depart_id' => $arrets[$i]->id,
                    'arret_arrivee_id' => $arrets[$j]->id,
                    'duree' => null,
                    'prix' => null
                ]);
                echo $trajet;
            }
        }
    }
}
