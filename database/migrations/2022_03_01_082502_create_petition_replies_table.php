<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('petition_id');
            $table->string('document_description',500);
            $table->date('date')->nullable();
            $table->string('page_info')->nullable();
            $table->string('annexure')->nullable();
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
        Schema::dropIfExists('petition_replies');
    }
}
