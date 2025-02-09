<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bu>
 */
class BuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'immatriculation' => $this->faker->randomNumber(),
            'places' =>50,
            'statut'=> 'disponible',
            'compagnie_id' => 1
        ];
    }
}
