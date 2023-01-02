<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fir;
use App\Models\Section;
use App\Models\Statute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;

class FirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('role:admin')->except(['getStatute', 'sectionSearchResult', 'downloadAllFirPdf']);
    }
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //validate data 
            $validator = Validator::make($request->all(), [

                'arrest_info' => 'max:190',
                'warrent_info' => 'max:190',
                'bailable_info' => 'max:190',
                'compoundable_info' => 'max:190',
                'punishment_info' => 'max:190',
            ]);
            if ($validator->fails()) {
                return response()->json(
                    [
                        "validation_error" => $validator->errors(),
                    ],
                    422
                );
            }
            //return response($request->all(), 403);
            Section::updateOrCreate(['id' => $request->id], $request->except(''));

            return response()->json(
                [
                    'message' => 'Fir Data Saved Successfully',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fir_id)
    {
        try {
            $firData = Section::find($fir_id);

            return response([
                "firData" => $firData,
                "message" => "Single Fir Data"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fir_id)
    {
        try {
            $fir_data = Section::find($fir_id);

            if ($fir_data) {
                $fir_data->delete();
                return response("Deleted Successfully", 200);
            } else {
                return response('Link Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getStatute()
    {
        try {
            $statutes = Statute::get();
            return response([
                "statutes" => $statutes,
                "message" => "All Fir Statuses"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function downloadAllFirPdf()
    {
        try {
            $firs = Section::with("statute")->where("deleted_at", null)->get();
            //return view('fir_pdf.all_fir_pdf', compact('firs'));
            if ($firs) {
                info("Start Downloading Firs PDF");
                ini_set('memory_limit', '-1');
                $pdf = PDF::loadView('fir_pdf.all_fir_pdf', compact('firs'));
                return $pdf->download("fir.pdf");
                info("Complete Downloading Firs PDF");
            } else {
                return response('Firs Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function sectionSearchResult(Request $request)
    {
        try {
            $sectionSearchResults = array();
            if ($request->filterSections) {

                foreach ($request->filterSections as $filterSection) {
                    if (!empty($filterSection['statute_id']) || !empty($filterSection['section'])) {
                        $query = Section::query();
                        if (!empty($filterSection['statute_id'])) {
                            $query->where('statute_id',  $filterSection['statute_id']);
                        }
                        if (!empty($filterSection['section'])) {
                            $query->where('fir_no', 'like', '%' . $filterSection['section'] . '%');
                        }
                        $item = array();
                        $item = [
                            'fir_no' =>   $request->sectionData['fir_no'],
                            'police_station' =>   $request->sectionData['police_station'],
                            'year' =>   $request->sectionData['year']
                        ];
                        $item['data'] = $query->get();

                        $sectionSearchResults[] = $item;
                    }
                }
            }

            return response([
                "sectionSearchResults" => $sectionSearchResults,
                "fir_reader_result_pdf_download_url" => url("fir_reader_result_pdf_download"),
                "message" => "All Fir Data"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
