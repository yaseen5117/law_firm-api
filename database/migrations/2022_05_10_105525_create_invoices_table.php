<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_sender_id')->nullable();
            $table->integer('invoiceable_id')->nullable();
            $table->string('invoiceable_type')->nullable();                          
            $table->date('due_date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->float('amount')->nullable();
            $table->integer('status')->nullable();
            
            $table->boolean('apply_tax')->default(0)->nullable();
            $table->float('tax_percentage')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
