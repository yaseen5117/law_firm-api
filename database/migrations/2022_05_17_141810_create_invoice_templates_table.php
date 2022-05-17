<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('invoice_templates');
        Schema::create('invoice_templates', function (Blueprint $table) {
            $table->id();
            $table->string('subject',1000);
            $table->text('content');
            $table->timestamps();
        });

        DB::table('invoice_templates')->insert([
            'subject'=>'Professional Fee for Providing Legal Opinion',
            'content'=>"Dear Sirs:

 

Please see attached our Invoice for professional services to the tune of Rs.25,000/-for providing legal opinion on a query about the State Bank’s Circular addressed to Commercial Banks regarding closure of bank accounts of government ministries and subordinate bodies. The opinion was sought by learned Head of Accounts via email dated 16th December, 2020. Legal Opinion was provided on an urgent basis via email dated 19th December, 2020.

 

Please note that cheque is payable to “Umer Gilani”. We would appreciate payment of our invoice within seven (7) days. 

 

Very truly yours,

",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_templates');
    }
}
