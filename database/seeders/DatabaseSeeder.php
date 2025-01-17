<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Voyage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    //use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Seeders
         $this->call([
            RolesSeeder::class,
            AdminsSeeder::class,
            ArretsSeeder::class,
            LignesSeeder::class,
        ]);

        // Factories
        \App\Models\User::factory(50)->create();
        \App\Models\Bu::factory(30)->create();


        //Voyage::factory(10)->create(); //manque de trajet


    }
}
