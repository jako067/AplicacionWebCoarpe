<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('create_daily_work_table', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('reporte');
            $table->string('evaluation');
            $table->text('incidences');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('create_daily_work_table');
    }
};
