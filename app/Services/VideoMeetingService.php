<?php

namespace App\Services;

use App\Models\Setting;
use Mail;
use Exception;
use Illuminate\Support\Facades\Http;


/**
 * 
 */
class VideoMeetingService
{

    protected $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmFwcGVhci5pbiIsImF1ZCI6Imh0dHBzOi8vYXBpLmFwcGVhci5pbi92MSIsImV4cCI6OTAwNzE5OTI1NDc0MDk5MSwiaWF0IjoxNjY0OTU2NTExLCJvcmdhbml6YXRpb25JZCI6MTcwNDU0LCJqdGkiOiI4ZTQ0NjQ2MS00Y2I5LTQwZjMtOWE5Yy03NzdjNTE5ZTRlNDYifQ.SlIdkb2_XuZiGPPfHi_taJlB8UOD0aRanl5BPJFZvS8";

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

	public function initMeeting()
    {
        $url = "https://api.whereby.dev/v1/meetings";
        $end_date = date("Y-m-d",strtotime("+1 day"));
        $headers = [
        'Authorization' => 'Bearer '. $this->token,
        'Content-Type' => 'application/json'
        ];
        $body = [
            "isLocked" => false,
            "roomNamePrefix" => "",
            "roomNamePattern" => "uuid",
            "roomMode"  => "normal",
            "endDate" => $end_date,
            "fields" => [
                "hostRoomUrl"
            ]
        ];
        
        $response = Http::withHeaders($headers)->post($url, $body);
        dd($response->object());
    }
}
