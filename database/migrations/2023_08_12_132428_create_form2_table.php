<?php

use Faker\Provider\ar_EG\Text;
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
        Schema::create('form2', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('app_id');
            $table->text('description');
            $table->text('data_col_plan');
            $table->text('exp_result');
            $table->string('yes_no1');
            $table->text('if_involve');
            $table->string('yes_no2');
            $table->text('partic_kept_uniformed');
            $table->text('poten_contr');
            $table->string('yes_no3');
            $table->text('research_before');
            $table->string('rname');
            $table->string('sname');

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
        Schema::dropIfExists('form2');
    }
};
