<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsInGeneralCaseLawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_case_laws', function (Blueprint $table) {
            $table->string('citation')->nullable()->after('case_title');
            $table->string('legal_provisions')->nullable()->after('citation');
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
            $table->dropColumn('citation');
            $table->dropColumn('legal_provisions');
        });
    }
}
