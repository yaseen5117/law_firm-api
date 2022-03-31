<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionHearingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition_hearings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petition_id');
            $table->date('hearing_date')->nullable();  
            $table->longText('hearing_summary')->nullable();  
            $table->longText('order_summary')->nullable();        
            $table->date('assigned_date')->nullable();      
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
        Schema::dropIfExists('petition_hearings');
    }
}
