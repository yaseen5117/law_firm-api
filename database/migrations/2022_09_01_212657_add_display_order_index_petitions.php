<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisplayOrderIndexPetitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petition_indices', function (Blueprint $table) {
            $table->unsignedInteger('display_order')->nullable()->after('annexure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petition_indices', function (Blueprint $table) {
            $table->dropColumn('display_order');
        });
    }
}
