<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionLayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition_layers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petition_id');  
            $table->unsignedBigInteger('layer_id');             
            $table->integer("display_order")->nullable();               
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petition_layers');
    }
}
