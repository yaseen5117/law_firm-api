<?php

namespace App\Services;

use App\Models\Setting;
use Mail;
use Exception;

/**
 * 
 */
class EmailService
{

	function __construct()
	{
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

	public function sendInvoiceEmail($invoice, $cc_emails, $pdf)
	{
		info("EmailService: sendInvoiceEmail for Invoice $invoice->id");

		Mail::send('emails.invoice_email', compact('invoice'), function ($message) use ($invoice, $cc_emails, $pdf) {

			$message->subject($invoice->invoice_meta->subject);
			$message->to($invoice->client->email, $invoice->client->name);
			if (!empty($cc_emails)) {
				$message->cc($cc_emails);
			}
			$message->attachData($pdf->output(), 'Invoice-' . $invoice->invoice_no . '.pdf');

			/*if( isset($emailData['cc']) && !empty($emailData['cc']) ) {
	                $message->cc( $emailData['cc'] , $emailData['ccName'] );
	            }

	            if(isset($emailData['bcc']) && !empty($emailData['bcc']) ) {
	                $message->cc( $emailData['bcc'] , $emailData['bccName'] );
	            }*/
		});

		info("EmailService: sendInvoiceEmail successfully sent Email: ");
	}

	public function send_email_before_hearing($tomorrow_hearing)
	{
		try {
			info("EmailService: send_email_before_hearing for Hearing $tomorrow_hearing->id");
			$user = request()->user();
			$setting = Setting::getSetting();
			//[
			// 	"site_name" => "site Name",
			// 	"site_url" => "Url"
			// ]; 
			$petition = $tomorrow_hearing->petition()->withoutGlobalScopes()->first();

			if ($petition->petitioners->count() > 0) {
				info("EmailService: send_email_before_hearing to petitioners" . print_r($petition->petitioners->pluck('petitioner_id')->all(), 1));
				foreach ($petition->petitioners as $petition_petitioner) {
					$user = $petition_petitioner->user;
					Mail::send('emails.hearing_tomorrower_reminder', compact('user', 'petition', 'tomorrow_hearing', 'setting'), function ($message) use ($user, $petition) {
						$message->subject("Hearing Reminder: $petition->petition_standard_title_with_petitioner ");
						$message->to($user->email, $user->name);
					});
					info("EmailService: sendInvoiceEmail successfully sent to user email: " . $user->email);
				}
			}

			if ($petition->lawyers->count() > 0) {
				info("EmailService: send_email_before_hearing to lawyers" . print_r($petition->lawyers->pluck('lawyer_id')->all(), 1));
				foreach ($petition->lawyers as $petition_lawyer) {
					$user = $petition_lawyer->user;
					Mail::send('emails.hearing_tomorrower_reminder', compact('user', 'petition', 'tomorrow_hearing', 'setting'), function ($message) use ($user, $petition) {
						$message->subject("Hearing Reminder: $petition->petition_standard_title_with_petitioner ");
						$message->to($user->email, $user->name);
					});
					info("EmailService: sendInvoiceEmail successfully sent to user email: " . $user->email);
				}
			}


			info("EmailService: sendInvoiceEmail function complete: ");
		} catch (Exception $e) {
			info("EmailService: send_email_before_hearing for Hearing $tomorrow_hearing->id ERROR SENDING EMAIL: " . $e->getMessage());
		}
	}


	public function send_document_uploading_email($petition, $attachmentable_type)
	{
		$subject = "Case (" . $petition->petition_standard_title_with_petitioner . ") document(s) uploaded in: $attachmentable_type";
		$view = "emails.documents_uploaded_email";
		try {
			info("EmailService: send_document_uploading_email for petition $petition->id");

			if ($petition->petitioners->count() > 0) {
				info("EmailService: send_document_uploading_email for petition  petitioners" . print_r($petition->petitioners->pluck('id')->all(), 1));
				foreach ($petition->petitioners as $petition_petitioner) {
					$user = $petition_petitioner->user;
					Mail::send($view, compact('user', 'petition', 'attachmentable_type'), function ($message) use ($user, $petition, $subject) {
						$message->subject($subject);
						$message->to($user->email, $user->name);
					});
					info("EmailService: send_document_uploading_email  successfully sent to user email: " . $user->email);
				}
			}
			if ($petition->lawyers->count() > 0) {
				info("EmailService: send_email_before_hearing to lawyers" . print_r($petition->lawyers->pluck('id')->all(), 1));
				foreach ($petition->lawyers as $petition_lawyer) {
					$user = $petition_lawyer->user;
					Mail::send($view, compact('user', 'petition', 'attachmentable_type'), function ($message) use ($user, $petition, $subject) {
						$message->subject($subject);
						$message->to($user->email, $user->name);
					});
					info("EmailService: send_document_uploading_email  successfully sent to user email: " . $user->email);
				}
			}
			info("EmailService: send_document_uploading_email function complete: ");
		} catch (Exception $e) {
			info("EmailService: send_document_uploading_email for petition  $petition->id ERROR SENDING EMAIL: " . $e->getMessage());
		}
	}
	public function sendClientSignUpEmail($user, $setting, $password, $login_url, $send_email_and_password)
	{
		info("EmailService: sendClientSignUpEmail for User Eamil TO: $user->email");

		Mail::send('emails.client_signup_email', compact('user', 'setting', 'password', 'login_url', 'send_email_and_password'), function ($message) use ($setting, $user) {
			$message->subject("Welcome to " . $setting['site_name']);
			$message->to($user->email, $user->name);
		});

		info("EmailService: sendClientSignUpEmail successfully sent Email TO: $user->email");
	}
	public function sendAdminSignUpEmail($user, $setting, $password, $login_url, $send_email_and_password)
	{
		info("EmailService: sendAdminSignUpEmail for User Eamil TO: $user->email");

		Mail::send('emails.admin_signup_email', compact('user', 'setting', 'password', 'login_url', 'send_email_and_password'), function ($message) use ($setting, $user) {
			$message->subject("Welcome to " . $setting['site_name']);
			$message->to($user->email, $user->name);
		});

		info("EmailService: sendAdminSignUpEmail successfully sent Email TO: $user->email");
	}
	public function sendLawyerSignUpEmail($user, $setting, $password, $login_url, $send_email_and_password)
	{
		info("EmailService: sendLawyerSignUpEmail for User Eamil TO: $user->email");

		Mail::send('emails.lawyer_signup_email', compact('user', 'setting', 'password', 'login_url', 'send_email_and_password'), function ($message) use ($setting, $user) {
			$message->subject("Welcome to " . $setting['site_name']);
			$message->to($user->email, $user->name);
		});

		info("EmailService: sendLawyerSignUpEmail successfully sent Email TO: $user->email");
	}
}
