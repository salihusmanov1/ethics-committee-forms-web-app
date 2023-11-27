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
        Schema::create('reporting_changes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('app_id');
            $table->string('protocol_no')->nullable();
            $table->string('explanation_of_changes')->nullable();
            $table->string('if_could_harm_participants')->nullable();
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
        Schema::dropIfExists('reporting_changes');
    }
};
