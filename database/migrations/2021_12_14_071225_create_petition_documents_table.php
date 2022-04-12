<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('petition_documents', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('petition_id');  
        //     $table->string('title')->nullable();
        //     $table->string('file_name')->nullable();
        //     $table->text('comments')->nullable();
        //     $table->integer("display_order")->nullable();               
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('petition_documents');
    }
}
