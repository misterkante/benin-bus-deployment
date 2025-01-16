<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'nom_compagnie' => 'BeninBus',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admin');

    }
}
