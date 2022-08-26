<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('payments', 'invoice_id')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->dropColumn('invoice_id');
            });
        }
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('invoiceable_id')->after('id')->nullable();
            $table->string('invoiceable_type')->after('invoiceable_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('invoiceable_id');
            $table->dropColumn('invoiceable_type');
        });
    }
}
