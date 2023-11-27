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
        Schema::create('form1', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('app_id');
            $table->string('title_of_study');
            $table->string('type_of_study');
            $table->json('researchers');
            $table->json('other_researchers');
            $table->json('advisors');
            $table->date('expected_time_frame');
            $table->json('org_inst');
            $table->string('question_8');
            $table->json('question_9');
            $table->string('status');
            $table->json('reporting_changes');
            $table->json('extension_pr_study');
            $table->text('question_11');
            $table->text('question_12');
            $table->string('question_13');
            $table->text('question_14');
            $table->string('question_15');
            $table->string('question_16');
            $table->json('question_17');
            $table->text('question_18');
            $table->text('question_19');
            $table->json('question_20');
            $table->string('question_21');
            $table->string('rname');
            $table->date('rdate');
            $table->string('sname');
            $table->date('sdate');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('app_status')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form1');
    }
};
