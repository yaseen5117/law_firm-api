<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('court_id');
            $table->unsignedBigInteger('case_type_id');
            $table->string('name');
            $table->string('writ_number')->nullable();
            $table->text('judgement')->nullable();
            $table->longText('order_sheet')->nullable(); 
            $table->string('status')->nullable();   
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
        Schema::dropIfExists('petitions');
    }
}
