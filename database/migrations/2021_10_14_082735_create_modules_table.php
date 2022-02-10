<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('repo')->nullable();
            $table->string('doc_root')->nullable();
            $table->string('db_name')->nullable();
            $table->string('db_user')->nullable();
            $table->string('db_password')->nullable();
            $table->string('php_my_admin')->nullable();
            $table->string('type')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('server_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
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
        Schema::dropIfExists('modules');
    }
}
