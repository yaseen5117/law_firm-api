<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_services', function (Blueprint $table) {
            $table->id();
            $table->boolean('mailgun')->default(0);
            $table->boolean('twillio')->default(0);
            $table->boolean('gateway')->default(0);
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->string('display_order')->nullable();
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
        Schema::dropIfExists('support_services');
    }
}
