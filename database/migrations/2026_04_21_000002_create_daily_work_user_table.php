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
        Schema::create('daily_work_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daily_work_id')->constrained('daily_works', 'id_daily_work');
            $table->foreignId('user_id')->constrained();
            $table->decimal('extra_hours', 4, 2)->default(0);
            $table->unique(['daily_work_id', 'user_id'], 'foreign_keys');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_work_user');
    }
};
