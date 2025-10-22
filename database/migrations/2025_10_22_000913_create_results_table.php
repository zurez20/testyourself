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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('playerId')->nullable();
            $table->integer('categoryId')->nullable();
            $table->integer('ageRangeId')->nullable();
            $table->integer('totalQuestions')->nullable();
            $table->integer('correctAnswers')->nullable();
            $table->decimal('score', 5, 2)->nullable();
            $table->integer('attemptNumber')->nullable();
            $table->timestamp('attempted_at')->useCurrent();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
