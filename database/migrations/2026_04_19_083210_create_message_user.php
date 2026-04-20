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
        Schema::create('messages_users', function (Blueprint $table) {
            $table->foreignId('messages_id')->constrained();
            $table->foreignId('users_id')->constrained();
            $table->unique(['messages_id','users_id'],'foreign_keys');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages_users');
    }
};
