<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleColumnAndRemovedOtherColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('support_services', function (Blueprint $table) {
            $table->dropColumn('mailgun');
            $table->dropColumn('twillio');
            $table->dropColumn('gateway');
            $table->dropColumn('user_id');
            $table->string('title')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('support_services', function (Blueprint $table) {
            $table->boolean('mailgun')->default(0);
            $table->boolean('twillio')->default(0);
            $table->boolean('gateway')->default(0);
            $table->unsignedInteger('user_id')->nullable();
            $table->dropColumn('title');
        });
    }
}
