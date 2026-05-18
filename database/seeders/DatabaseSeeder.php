<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            MaterialSeeder::class,
            BudgetSeeder::class,
            BudgetMaterialSeeder::class,
            AbsenceSeeder::class,
            TaskSeeder::class,
            MessageSeeder::class,
            GroupSeeder::class,
            MessageUserSeeder::class,
            GroupUserSeeder::class,
        ]);
    }
}
