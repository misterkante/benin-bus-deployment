<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        $user1 = User::create([
            'nom_compagnie' => 'BeninBus',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);
        $user2 = User::create([
            'nom' => 'User',
            'prenom' => 'Test',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);

        $user1->assignRole('admin');
        $user2->assignRole('client');

    }
}
