<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetFactory extends Factory
{
    public function definition(): array
    {
        return [
            'final_price' => fake()->randomFloat(2, 1000, 50000),
            'workers_quantity' => fake()->numberBetween(1, 20),
            'staff_quantity' => fake()->numberBetween(0, 10),
            'staff_price' => fake()->randomFloat(2, 10, 200),
            'hours_quantity' => fake()->numberBetween(1, 200),
            'price_x_hour' => fake()->randomFloat(2, 10, 150),
        ];
    }
}
