<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AbsenceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'fecha' => fake()->dateTimeBetween('-3 months', 'now'),
            'tipo' => fake()->randomElement(['retraso', 'ausencia', 'permiso']),
            'descripcion' => fake()->sentence(),
        ];
    }
}
