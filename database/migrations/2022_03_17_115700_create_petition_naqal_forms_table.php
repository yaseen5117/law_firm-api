<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionNaqalFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition_naqal_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('petition_id');
            $table->integer('naqal_form_type_id');
            $table->date('naqal_form_date')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('petition_naqal_forms');
    }
}
