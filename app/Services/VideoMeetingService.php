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

    /* https://elawfirmpk.whereby.com/c493cdcf-11f8-4d4d-81e9-76f9e9cf48fc?roomKey=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtZWV0aW5nSWQiOiI2MTI5OTM2MSIsInJvb21SZWZlcmVuY2UiOnsicm9vbU5hbWUiOiIvYzQ5M2NkY2YtMTFmOC00ZDRkLTgxZTktNzZmOWU5Y2Y0OGZjIiwib3JnYW5pemF0aW9uSWQiOiIxNzA0NTQifSwiaXNzIjoiaHR0cHM6Ly9hY2NvdW50cy5zcnYud2hlcmVieS5jb20iLCJpYXQiOjE2NjQ5Njc0MjcsInJvb21LZXlUeXBlIjoibWVldGluZ0hvc3QifQ.9kUwPwG-b1OFEP9vhHWOGkZdVJhHC_KZM9dTGs0YQfw&displayName=ELawFirmPk&pipButton=off */

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
        
        if($response->status()==201){
            $success = true;
            $response_data = $response->object();
        }else{
            $success = false;
            $response_data = null;
            info("Error creating whereby meeting: ".print_r($response->object(),1));
        }

        return (object) [
            "success"=>$success,
            "response_data"=>$response_data,
        ];
    }
}
