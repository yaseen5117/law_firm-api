<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveExtraColumnsFromServers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servers', function (Blueprint $table) {
            $table->dropColumn('ip_address')->nullable();
            $table->dropColumn('login')->nullable();
            $table->dropColumn('password')->nullable();
            $table->dropColumn('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servers', function (Blueprint $table) {
            $table->string('ip_address')->nullable();
            $table->string('login')->nullable();
            $table->string('password')->nullable();
            $table->unsignedInteger('user_id')->nullable();
        });
    }
}
