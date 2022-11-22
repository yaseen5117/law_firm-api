<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimitationCalculatorCaseSubAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limitation_calculator_case_sub_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('limitation_calculator_answer_id')->nullable();
            $table->string('sub_answer')->nullable();
            $table->string('date_field_label')->nullable();
            $table->integer('days')->nullable();
            $table->integer('display_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('limitation_calculator_case_sub_answers');
    }
}
