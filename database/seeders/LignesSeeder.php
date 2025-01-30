<?php

namespace Database\Seeders;

use App\Models\Arret;
use App\Models\Trajet;
use App\Models\ArretLigne;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LignesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lignes =
            [
                [
                    'nom' => 'Cotonou - Bohicon - Dassa-Zoumè - Parakou - Malanville',
                    'compagnie_id' => 1,
                    'distance_km' => 800,
                ],
                [
                    'nom' => 'Cotonou - Porto-Novo - Igolo', //(frontière Nigéria)
                    'compagnie_id' => 1,
                    'distance_km' => 150,
                ],
                [
                    'nom' => 'Comè - Lokossa - Athiémé - Djakotomey',
                    'compagnie_id' => 1,
                    'distance_km' => 200,
                ],
                [
                    'nom' => 'Parakou - Kandi - Malanville',
                    'compagnie_id' => 1,
                    'distance_km' => 450,
                ],
                [
                    'nom' =>  'Allada - Ouidah - Grand-Popo - Hillacondji', //(frontière Togo)
                    'compagnie_id' => 1,
                    'distance_km' => 120,
                ],
                [
                    'nom' => 'Cotonou - Sèmè-Kpodji',
                    'compagnie_id' => 1,
                    'distance_km' => 50,
                ],
                [
                    'nom' => 'Bohicon - Abomey - Covè - Za-Kpota',
                    'compagnie_id' => 1,
                    'distance_km' => 75,
                ],
                [
                    'nom' => 'Abomey-Calavi - Godomey - Cotonou',
                    'compagnie_id' => 1,
                    'distance_km' => 20,
                ],
                [
                    'nom' => 'Djougou - Natitingou - Porga',
                    'compagnie_id' => 1,
                    'distance_km' => 300,
                ],
                [
                    'nom' => 'Parakou - Tchaourou - Bassila',
                    'compagnie_id' => 1,
                    'distance_km' => 220,
                ],
                [
                    'nom' => 'Savalou - Glazoué - Bantè',
                    'compagnie_id' => 1,
                    'distance_km' => 95,
                ],
                [
                    'nom' => 'Nikki - Kalalé - Ségbana',
                    'compagnie_id' => 1,
                    'distance_km' => 180,
                ],
            ];

        // Récupérer les arrets avec leur id
        $arretsAvecId = DB::table('arrets')->pluck('id', 'nom')->toArray();

        // Insertion des lignes et association avec les arrets concernés
        foreach ($lignes as $ligne) {

            // Insérer chaque ligne et récupérer son ID
            $ligneId = DB::table('lignes')->insertGetId([
                'nom' => $ligne['nom'],
                'compagnie_id' => $ligne['compagnie_id'],
                'distance_km' => $ligne['distance_km'],
            ]);
            // Récupérer les villes de la ligne
            $villes = explode(' - ', $ligne['nom']);

            // Récupérer les IDs des arrêts (villes)
            $arrets = Arret::whereIn('nom', $villes)->get();

            // Enregistrer les arrêts dans la table ArretLigne avec l'ordre
            foreach ($arrets as $index => $arret) {
                ArretLigne::create([
                    'ligne_id' => $ligneId,
                    'arret_id' => $arret->id,
                    'ordre' => $index + 1,  // L'ordre commence à 1
                ]);
            }

            // Enregistrer les trajets pour toutes les combinaisons de villes
            foreach ($arrets as $depart) {
                foreach ($arrets as $arrivee) {
                    if ($depart->id !== $arrivee->id) {  // On ne crée pas de trajet pour une ville avec elle-même
                        // Créer un trajet entre depart et arrivee
                        Trajet::create([
                            'ligne_id' => $ligneId,
                            'depart_id' => $depart->id,
                            'arrivee_id' => $arrivee->id,
                            'duree' => random_int(1,5),  // À définir selon ta logique
                            'prix' => random_int(2000, 15000),   // À définir selon ta logique
                        ]);
                    }
                }
            }
        }
    }
}
