<?php

namespace App\Services;
use Mail;
/**
 * 
 */
class EmailService
{
	
	function __construct()
	{
		info("In email service:");
	}

	public function sendInvoiceEmail($invoice,$pdf)
	{
		info("EmailService: sendInvoiceEmail for Invoice $invoice->id");
		try {			           
			Mail::send('emails.invoice_email', compact('invoice') , function ($message) use ($invoice,$pdf) {

	            $message->subject( $invoice->invoice_meta->subject );
	            $message->to( $invoice->client->email , $invoice->client->name );
				$message->attachData($pdf, "Invoice.pdf");

	            /*if( isset($emailData['cc']) && !empty($emailData['cc']) ) {
	                $message->cc( $emailData['cc'] , $emailData['ccName'] );
	            }

	            if(isset($emailData['bcc']) && !empty($emailData['bcc']) ) {
	                $message->cc( $emailData['bcc'] , $emailData['bccName'] );
	            }*/
        	});
			
			info("EmailService: sendInvoiceEmail successfully sent Email: ");
		} catch (\Exception $e) {
			info("EmailService: sendInvoiceEmail failed " . $e->getMessage());
			
		}
	}
}