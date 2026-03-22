<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budget_material', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->constrained('budgets', 'id_budget');
            $table->foreignId('material_id')->constrained('materials', 'material_id');
            $table->integer('quantity');
            $table->unique(['budget_id', 'material_id'], 'foreign_keys');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_material');
    }
};
