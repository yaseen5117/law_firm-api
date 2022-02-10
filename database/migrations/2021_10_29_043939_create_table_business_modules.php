<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBusinessModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_modules', function (Blueprint $table) {
            $table->id();
            $table->integer('server_module_id')->nullable();
            $table->string('model_name')->nullable();
            $table->boolean('is_archive')->default(0); 
            $table->string('server_name')->nullable();
            $table->string('url')->nullable();
            $table->string('db_name')->nullable();
            $table->string('db_user')->nullable();
            $table->string('db_password')->nullable();
            $table->string('php_my_admin')->nullable();
            $table->string('repo')->nullable();
            $table->integer('display_order')->nullable();
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
        Schema::dropIfExists('business_modules');
    }
}
