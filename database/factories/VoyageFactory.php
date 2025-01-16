<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voyage>
 */
class VoyageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_voyage' => $this->faker->date(),
            'heure_depart' => $this->faker->time('H:i'),
            'trajet_id' => $this->faker->randomNumber,
        ];
    }
}
