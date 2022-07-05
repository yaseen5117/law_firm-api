<?php

namespace App\Http\Controllers\Api;
use App\Services\EmailService;
use App\Models\PetitionHearing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CronjobController extends Controller
{

    private $emailService;

    function __construct()
    {
        
        
    }

    public function send_email_before_hearing()
    {
        $emailService = new EmailService;
        info("CronjobController: send_email_before_hearing: START at ". date("d-M-Y H:i:s a"));

        $date_tomorrow = Date("Y-m-d", strtotime("+1 day"));
        $hearings_tomorrow = PetitionHearing::where('hearing_date',$date_tomorrow)->get();
        foreach ($hearings_tomorrow as $tomorrow_hearing) {
            $emailService->send_email_before_hearing($tomorrow_hearing);
        }
        info("CronjobController: send_email_before_hearing: Hearings found for date $date_tomorrow are: ". $hearings_tomorrow->count(). " Hearing IDs ".print_r($hearings_tomorrow->pluck('id')->all(),1));
        info("CronjobController: send_email_before_hearing: END at ". date("d-M-Y H:i:s a"));
        
    }
}
