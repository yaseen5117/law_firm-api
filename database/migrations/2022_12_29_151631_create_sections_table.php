<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('fir_no')->nullable();
            $table->string('title')->nullable(); //we assume petitioner id here
            $table->string('link')->nullable();
            $table->string('defination')->nullable();
            $table->unsignedInteger('statute_id')->nullable();

            $table->string('arrest_info')->nullable();
            $table->string('warrent_info')->nullable();
            $table->string('bailable_info')->nullable();
            $table->string('compoundable_info')->nullable();
            $table->string('punishment_info')->nullable();
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
        Schema::dropIfExists('sections');
    }
}
