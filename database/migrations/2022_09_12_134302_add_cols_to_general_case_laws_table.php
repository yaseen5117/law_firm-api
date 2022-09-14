<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToGeneralCaseLawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_case_laws', function (Blueprint $table) {
            $table->string('slug', 999)->nullable()->after('keywords');
            $table->longText('content')->nullable()->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_case_laws', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('content');
        });
    }
}
