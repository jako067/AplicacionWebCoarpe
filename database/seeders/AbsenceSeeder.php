<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absence;

class AbsenceSeeder extends Seeder
{
    public function run(): void
    {
        Absence::factory()->count(15)->create();
    }
}
