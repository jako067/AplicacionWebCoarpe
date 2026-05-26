<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName(),
            'phone' => $this->faker->phoneNumber(),
            'DNI' => strtoupper($this->faker->unique()->bothify('########?')),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'rol' => $this->faker->randomElement(['laborer', 'admin', 'foreman']),
            'remember_token' => Str::random(10),
        ];
    }
}
