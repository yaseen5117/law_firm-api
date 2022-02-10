<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads_contact_details', function (Blueprint $table) {
            $table->id();
            
            $table->integer('lead_id')->nullable();
            $table->integer('product_id')->nullable();
            
            $table->string('contact_name')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_phone_number')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('website_url')->nullable();
            
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
        Schema::dropIfExists('leads_contact_details');
    }
}
