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
        Schema::create('extension_of_previous_study', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('app_id');
            $table->string('protocol_no')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('any_differences')->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('app_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extension_of_previous_study');
    }
};
