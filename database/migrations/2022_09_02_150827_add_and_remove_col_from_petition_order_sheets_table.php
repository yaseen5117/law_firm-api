<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAndRemoveColFromPetitionOrderSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('petiton_order_sheets', 'title')) {
            Schema::table('petiton_order_sheets', function (Blueprint $table) {
                $table->dropColumn('title');
            });
        }
        if (Schema::hasColumn('petiton_order_sheets', 'description')) {
            Schema::table('petiton_order_sheets', function (Blueprint $table) {
                $table->dropColumn('description');
            });
        }
        // Schema::table('petiton_order_sheets', function (Blueprint $table) {
        //     $table->date('next_hearing_date')->after('order_sheet_type_id')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petiton_order_sheets', function (Blueprint $table) {
            //$table->dropColumn("next_hearing_date");
        });
    }
}
