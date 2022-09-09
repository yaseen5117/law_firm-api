<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisplayOderColToCaseLawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_laws', function (Blueprint $table) {
            $table->integer('display_order')->nullable()->after('annexure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('case_laws', function (Blueprint $table) {
            $table->dropColumn('display_order');
        });
    }
}
