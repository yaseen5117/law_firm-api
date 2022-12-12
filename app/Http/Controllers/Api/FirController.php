<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fir;

use App\Models\Statute;
use Illuminate\Http\Request;
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
        $this->middleware('role:admin')->except(['downloadAllFirPdf']);
    }
    public function index(Request $request)
    {
        try {

            $query = Fir::with("statute", "court");

            if (!empty($request->statute_id)) {
                $query->where('statute_id',  $request->statute_id);
            }
            if (!empty($request->section)) {
                $query->where('section', 'like', '%' . $request->section . '%');
            }

            $firs = $query->groupBy('firs.id')->orderby('firs.id', 'desc')->get();
            return response([
                "firs" => $firs,
                "fir_pdf_download_url" => url("download_all_fir_pdf"),
                "message" => "All Fir Data"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
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
                'section' => 'required|max:190',
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
            Fir::updateOrCreate(['id' => $request->id], $request->except(''));

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
            $firData = Fir::find($fir_id);

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
            $fir_data = Fir::find($fir_id);

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
            $firs = Fir::withoutGlobalScopes()->with("statute", "court")->where("deleted_at", null)->get();
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
}
