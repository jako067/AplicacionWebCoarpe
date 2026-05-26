<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Budget;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

class BudgetMaterialSeeder extends Seeder
{
    public function run(): void
    {
        $budgets = Budget::all();
        $materials = Material::all();

        foreach ($budgets as $budget) {
            $randomMaterials = $materials->random(rand(1, 5));

            foreach ($randomMaterials as $material) {
                DB::table('budget_material')->insert([
                    'budget_id' => $budget->id_budget,
                    'material_id' => $material->material_id,
                    'quantity' => rand(1, 20),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
