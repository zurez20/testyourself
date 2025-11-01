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
        Schema::create('playeranswers', function (Blueprint $table) {
            $table->id();
            $table->integer('playerId')->nullable();
            $table->integer('categoryId')->nullable();
            $table->integer('ageRangeId')->nullable();
            $table->integer('resultId')->nullable();
            $table->integer('questionId')->nullable();
            $table->integer('selectedAnswerId')->nullable();
            $table->integer('correctAnswerId')->nullable();
            $table->boolean('isCorrect')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playeranswers');
    }
};
