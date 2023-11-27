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
        Schema::create('form3', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('app_id');
            $table->json('questions');
            $table->string('question_1');
            $table->json('question_2');
            $table->json('question_3');
            $table->string('question_4');
            $table->string('question_5');
            $table->string('question_6');
            $table->json('question_7');
            $table->json('question_8');
            $table->string('question_9');
            $table->string('question_10');
            $table->string('question_11');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form3');
    }
};
