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

			$setting = Setting::withoutGlobalScopes()->whereCompanyId($tomorrow_hearing->company_id)->first();
			if (!empty($tomorrow_hearing->petition_id)) {
				$petition = $tomorrow_hearing->petition()->withoutGlobalScopes()->first();
				if ($petition->petitioners->count() > 0) {
					info("EmailService: send_email_before_hearing to petitioners" . print_r($petition->petitioners->pluck('petitioner_id')->all(), 1));
					foreach ($petition->petitioners as $petition_petitioner) {
						$user = $petition_petitioner->user;
						if ($user) {
							Mail::send('emails.hearing_tomorrower_reminder', compact('user', 'petition', 'tomorrow_hearing', 'setting'), function ($message) use ($user, $petition) {
								$message->subject("Hearing Reminder: $petition->petition_standard_title_with_petitioner ");
								$message->to($user->email, $user->name);
							});
							info("EmailService: send_email_before_hearing successfully sent to user email: " . $user->email);
						} else {
							info("EmailService: send_email_before_hearing to petitioners. ERROR Petitioner # $petition_petitioner->petitioner_id  Not found");
						}
					}
				}

				if ($petition->lawyers->count() > 0) {
					info("EmailService: send_email_before_hearing to lawyers" . print_r($petition->lawyers->pluck('lawyer_id')->all(), 1));
					foreach ($petition->lawyers as $petition_lawyer) {
						$user = $petition_lawyer->user;
						if ($user) {
							Mail::send('emails.hearing_tomorrower_reminder', compact('user', 'petition', 'tomorrow_hearing', 'setting'), function ($message) use ($user, $petition) {
								$message->subject("Hearing Reminder: $petition->petition_standard_title_with_petitioner ");
								$message->to($user->email, $user->name);
							});
							info("EmailService: send_email_before_hearing successfully sent to user email: " . $user->email);
						} else {
							info("EmailService: send_email_before_hearing to petitioners. ERROR LAWYER # $petition_lawyer->lawyer_id  Not found");
						}
					}
				}
			} else {
				$added_by_user = $tomorrow_hearing->user()->first();
				info("EmailService: send_email_before_hearing to Added By User" . print_r($added_by_user, 1));
				if ($added_by_user) {
					Mail::send('emails.event_tomorrow_reminder', compact('added_by_user', 'tomorrow_hearing', 'setting'), function ($message) use ($added_by_user) {
						$message->subject("Event Reminder");
						$message->to($added_by_user->email, $added_by_user->name);
					});
					info("EmailService: send_email_before_hearing successfully sent to Added By user email: " . $added_by_user->email);
				} else {
					info("EmailService: send_email_before_hearing with Hearing ID $tomorrow_hearing->id. Added By User Not found");
				}
			}

			info("EmailService: send_email_before_hearing function complete: ");
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

					if ($user) {
						// code...
						Mail::send($view, compact('user', 'petition', 'attachmentable_type'), function ($message) use ($user, $petition, $subject) {
							$message->subject($subject);
							$message->to($user->email, $user->name);
						});
						info("EmailService: send_document_uploading_email  successfully sent to user email: " . $user->email);
					} else {
						info("EmailService: send_document_uploading_email  petitioners. ERROR petition_petitioner # $petition_petitioner->petitioner_id  Not found");
					}
				}
			}
			if ($petition->lawyers->count() > 0) {
				info("EmailService: send_document_uploading_email to lawyers" . print_r($petition->lawyers->pluck('id')->all(), 1));
				foreach ($petition->lawyers as $petition_lawyer) {
					$user = $petition_lawyer->user;
					if ($user) {

						Mail::send($view, compact('user', 'petition', 'attachmentable_type'), function ($message) use ($user, $petition, $subject) {
							$message->subject($subject);
							$message->to($user->email, $user->name);
						});
						info("EmailService: send_document_uploading_email  successfully sent to user email: " . $user->email);
					} else {

						info("EmailService: send_document_uploading_email  to lawyers. ERROR petition_lawyer # $petition_lawyer->lawyer_id  Not found");
					}
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
	public function sendEmailToVerifyAccountByAdmin($setting, $user_profile_url)
	{
		info("EmailService: sendEmailToVerifyAccountByAdmin sending Email to Admin: " . $setting['site_email']);

		Mail::send('emails.email_to_verify_account_by_admin', compact('setting', 'user_profile_url'), function ($message) use ($setting) {
			$message->subject($setting['site_name'] . " | New User Registered");
			$message->to($setting['site_email']);
		});

		info("EmailService: sendEmailToVerifyAccountByAdmin successfully sent Email To Admin: " . $setting['site_email']);
	}
	public function sendUserApprovedEmail($user)
	{
		info("EmailService: sendUserApprovedEmail sending Email to User: " . $user);

		Mail::send('emails.user_approved_email', compact('user'), function ($message) use ($user) {
			$message->subject("Account Approved");
			$message->to($user->email);
		});

		info("EmailService: sendUserApprovedEmail successfully sent Email To User: ". $user);
	}
}