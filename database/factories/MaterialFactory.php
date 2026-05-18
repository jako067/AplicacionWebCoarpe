<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'material_name' => fake()->words(3, true),
            'unity_price' => fake()->randomFloat(2, 1, 500),
            'quantity' => fake()->numberBetween(1, 1000),
            'supplier_contact' => fake()->companyEmail(),
        ];
    }
}
