<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('user_id')->nullable(); //we assume petitioner id here
            $table->unsignedInteger('court_id')->nullable();
            $table->unsignedInteger('fir_status_id')->nullable();
            $table->string('section');
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
        Schema::dropIfExists('firs');
    }
}
