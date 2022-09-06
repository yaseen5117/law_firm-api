<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\ContractsAndAgreement;

use Illuminate\Http\Request;

class CmsPageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->page_type == "contract-and-agreement") {
            $ContractsAndAgreementHtml = ContractsAndAgreement::where('slug','like','%'.$request->page_slug.'%')->first();
            return response(
                $ContractsAndAgreementHtml
            ,200);
        }else{
            return response([
                "message"=>"Invalid"
            ],422);
        }
    }
}
