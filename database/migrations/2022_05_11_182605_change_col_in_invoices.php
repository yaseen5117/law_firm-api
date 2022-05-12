<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColInInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->unsignedInteger('invoice_status_id')->nullable()->after('invoice_no');
            $table->string('payment_method')->after('due_date');
            $table->text('notes')->after('due_date');
            $table->date('paid_date')->nullable()->after('due_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedInteger('status')->nullable()->after('invoice_no');
            $table->dropColumn('invoice_status_id');
            $table->dropColumn('paid_date');
            $table->dropColumn('payment_method');
            $table->dropColumn('notes');
        });
    }
}
