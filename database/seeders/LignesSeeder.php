<?php

namespace Database\Seeders;

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
        $lignes = [
            [
                'nom' => 'Cotonou - Bohicon - Dassa-Zoumè - Parakou - Malanville',
                'compagnie_id' => 1,
                'distance_km' => 800,
            ],
            [
                'nom' => 'Cotonou - Porto-Novo - Igolo (frontière Nigéria)',
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
                'nom' =>  'Allada - Ouidah - Grand-Popo - Hillacondji (frontière Togo)',
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

        DB::table('lignes')->insert($lignes);
    }
}
