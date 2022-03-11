<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPetitionReplyParentColInReplies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petition_replies', function (Blueprint $table) {
            $table->integer('petition_reply_parent_id')->after('id');
            $table->dropColumn('petition_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petition_replies', function (Blueprint $table) {
            $table->dropColumn('petition_reply_parent_id');
            $table->unsignedInteger('petition_id');
        });
    }
}
