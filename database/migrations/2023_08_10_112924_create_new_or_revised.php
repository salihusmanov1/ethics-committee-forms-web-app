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
        Schema::create('new_or_revised', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('app_id');
            $table->text('purpose_of_study')->nullable();
            $table->text('data_collection')->nullable();
            $table->string('if_aim_incorrect_info')->nullable();
            $table->text('if_harmful')->nullable();
            $table->integer('number_of_participants')->nullable();
            $table->string('if_cgroup_used')->nullable();
            $table->text('type_of_participants')->nullable();
            $table->text('verbal_consent_children')->nullable();
            $table->text('verbal_consent_pupils')->nullable();
            $table->text('descr_of_particip')->nullable();
            $table->text('expl_of_invitation')->nullable();
            $table->text('methods')->nullable();
            $table->text('possible_contributions')->nullable();

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
        Schema::dropIfExists('new_or_revised');
    }
};
