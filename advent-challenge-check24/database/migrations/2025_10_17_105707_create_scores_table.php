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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('challenge_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('part1_time_ms')->nullable();
            $table->unsignedInteger('part1_penalties')->default(0);
            $table->unsignedBigInteger('part2_time_ms')->nullable();
            $table->unsignedInteger('part2_penalties')->default(0);
            $table->unsignedBigInteger('total_time_ms')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'challenge_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
