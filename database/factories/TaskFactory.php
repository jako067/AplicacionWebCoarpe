<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        $entry = fake()->time();
        $exit = fake()->time();

        return [
            'task_date' => fake()->dateTimeBetween('-1 month', 'now'),
            'entry_time' => $entry,
            'exit_time' => $exit,
            'break_minutes' => fake()->numberBetween(0, 60),
            'extra_hours' => fake()->randomFloat(2, 0, 5),
            'total_hours' => fake()->randomFloat(2, 1, 10),
        ];
    }
}
