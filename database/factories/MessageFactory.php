<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'subject' => fake()->sentence(4),
            'body' => fake()->paragraph(3),
            'document' => fake()->optional()->lexify('document_????.pdf'),
        ];
    }
}
