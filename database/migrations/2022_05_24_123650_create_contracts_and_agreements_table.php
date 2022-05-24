<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsAndAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts_and_agreements', function (Blueprint $table) {
            $table->id();          
            $table->unsignedBigInteger('contract_category_id')->nullable();  
            $table->string('title')->nullable();       
            $table->integer('display_order')->nullable();      
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
        Schema::dropIfExists('contracts_and_agreements');
    }
}
