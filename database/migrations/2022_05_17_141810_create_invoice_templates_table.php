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
            'content'=>"<p>Dear Sirs: </p><p><br></p><p>Please see attached our Invoice for professional services to the tune of Rs.[total_amount]/-for providing legal opinion on a query about the State Bank’s Circular addressed to Commercial Banks regarding closure of bank accounts of government ministries and subordinate bodies. The opinion was sought by learned Head of Accounts via email dated [due_date]. Legal Opinion was provided on an urgent basis via email dated [due_date]. </p><p><br></p><p>Please note that cheque is payable to [client_name]. We would appreciate payment of our invoice within seven (7) days. </p><p><br></p><p>Very truly yours,</p>

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
