<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorNameColPetitionMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petition_meta', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->after('petition_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petition_meta', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
}
