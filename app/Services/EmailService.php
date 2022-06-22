<?php

namespace App\Services;

use App\Models\Setting;
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
	// public function adminEmails(){
	// 	$setting = Setting::find(1)->getMeta()->toArray();		 
	// 	$adminEmails[] = $setting["site_email"];
		
	// 	info("EmailService: Site Email: ".$setting["site_email"]);
	// 	if(!empty($setting["additionalemails"])){  			 
	// 		return array_merge($adminEmails,$setting["additionalemails"]);     
	// 		$additional_emails = $setting["additionalemails"];	
	// 		info("EmailService: Additional Emails: ".$setting["additionalemails"]);		
	// 		return $adminEmails = array_merge($adminEmails,$additional_emails);
	// 	}else{
	// 		return $adminEmails;
	// 	}
		
	// }

	public function sendInvoiceEmail($invoice,$cc_emails,$pdf)
	{		 
		info("EmailService: sendInvoiceEmail for Invoice $invoice->id");
	 		           
			Mail::send('emails.invoice_email', compact('invoice') , function ($message) use ($invoice,$cc_emails,$pdf) {

	            $message->subject( $invoice->invoice_meta->subject);
	            $message->to($invoice->client->email , $invoice->client->name);
				$message->cc($cc_emails);
				$message->attachData($pdf->output(), 'Invoice-'.$invoice->invoice_no.'.pdf');

	            /*if( isset($emailData['cc']) && !empty($emailData['cc']) ) {
	                $message->cc( $emailData['cc'] , $emailData['ccName'] );
	            }

	            if(isset($emailData['bcc']) && !empty($emailData['bcc']) ) {
	                $message->cc( $emailData['bcc'] , $emailData['bccName'] );
	            }*/
        	});
			
			info("EmailService: sendInvoiceEmail successfully sent Email: ");
		 
	}
}