<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContractsAndAgreement;
use App\Models\GeneralCaseLaw;
use App\Models\SamplePleading;
use Illuminate\Http\Request;

class CmsPageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->page_type == "contract-and-agreement") {
            $contractsAndAgreementHtml = ContractsAndAgreement::where('slug', 'like', '%' . $request->page_slug . '%')->first();
            return response(
                $contractsAndAgreementHtml,
                200
            );
        } else if ($request->page_type == "sample-pleading") {
            $samplePleading = SamplePleading::where('slug', 'like', '%' . $request->page_slug . '%')->first();
            return response(
                $samplePleading,
                200
            );
        } else if ($request->page_type == "general-case-law") {
            $generalCaseLaw = GeneralCaseLaw::where('slug', 'like', '%' . $request->page_slug . '%')->first();
            $generalCaseLaw->title = $generalCaseLaw->case_title;
            return response(
                $generalCaseLaw,
                200
            );
        } else {
            return response([
                "message" => "Invalid"
            ], 422);
        }
    }
}
