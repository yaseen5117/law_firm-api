<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fir;
use App\Models\Section;
use App\Models\Statute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use PDF;
use Dompdf\Dompdf;
use File;
class FirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('role:admin|staff')->except(['index', 'sectionSearchResult', 'downloadFirReaderResultAsPdf']);
    }
    public function index(Request $request)
    {

        try {
            $query = Section::with('statute', 'user');
            if (!empty($request->statute_id)) {
                $query->where('statute_id',  $request->statute_id);
            }
            if (!empty($request->section)) {
                $query->where('fir_no', $request->section);
            }
            if (!empty($request->title)) {
                $query->where('title', 'like', '%' . $request->title . '%');
            }
            $fir_sections = $query->paginate(20);
            return response()->json([
                'fir_sections' => $fir_sections,
                'message' => 'all fir sections'
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
        //return response($request->all(), 403);
        try {
            //validate data 
            // $validator = Validator::make($request->all(), [
            //     'title' => 'required|max:190',
            //     'arrest_info' => 'max:190',
            //     'warrent_info' => 'max:190',
            //     'bailable_info' => 'max:190',
            //     'compoundable_info' => 'max:190',
            //     'punishment_info' => 'max:190',
            // ]);
            // if ($validator->fails()) {
            //     return response()->json(
            //         [
            //             "validation_error" => $validator->errors(),
            //         ],
            //         422
            //     );
            // }
            $request->merge([
                'created_by' => auth()->user()->id
            ]);
            //return response($request->all(), 403);
            Section::updateOrCreate(['id' => $request->id], $request->except('statute'));

            return response()->json(
                [
                    'message' => 'FIR Data Saved Successfully',
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
            $firSectionData = Section::with("statute")->find($fir_id);

            return response([
                "firSectionData" => $firSectionData,
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
    public function destroy($fir_section_id)
    {
        try {
            $fir_section_data = Section::find($fir_section_id);

            if ($fir_section_data) {
                $fir_section_data->delete();
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

    public function downloadFirReaderResultAsPdf(Request $request)
    {
        try {
            $sectionSearchResults = array();
            if ($request->filterSections) {
                $sectionSearchResults = $this->getSectionSearchResult($request);
            }
            $search_item = [
                'fir_no' =>   $request->sectionData['fir_no'],
                'police_station' =>   $request->sectionData['police_station'],
                'year' =>   $request->sectionData['year']
            ];
            //return view('fir_pdf.all_fir_pdf', compact('sectionSearchResults','search_item'));
            if ($sectionSearchResults) {
                info("Start Downloading sectionSearchResults PDF");
                ini_set('memory_limit', '-1');
                
                // Instantiate Dompdf class
                $dompdf = new Dompdf();
                
                // Load HTML content
                $dompdf->loadHtml(view('fir_pdf.all_fir_pdf', compact('sectionSearchResults', 'search_item')));
                
                // Render PDF
                $dompdf->render();
                
                // Save PDF
                $pdf_file = 'fir-search-result-pdf/' . time() . '_document.pdf';
                $output = $dompdf->output();
               
                $path =  storage_path('app/public/fir-search-result-pdf');
                //  //delete directory
                // if (File::isDirectory($path)) {
                //     File::deleteDirectory($path);
                // }
                
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }
                $file_saved = file_put_contents(storage_path('app/public/' . $pdf_file), $output);

               return response([
                "file_path"=> url('storage/' . $pdf_file),
                "message"=>"Search Result File Saved Successfully."
               ], 200);
               
                info("Complete Downloading sectionSearchResults PDF");
            } else {
                return response('sectionSearchResults Data Not Found', 404);
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
                $sectionSearchResults = $this->getSectionSearchResult($request);
            }
            //check the given result array empty or not, checking @ 0 index
            $result_not_found = true;
            if (!$sectionSearchResults[0]->isEmpty()) {
                $result_not_found = false;
            }

            $search_item = [
                'fir_no' =>   $request->sectionData['fir_no'],
                'police_station' =>   $request->sectionData['police_station'],
                'year' =>   $request->sectionData['year']
            ];
            return response([
                "sectionSearchResults" => $sectionSearchResults,
                "search_item" => $search_item,
                'noResultFound' => $result_not_found,
                "fir_reader_result_pdf_download_url" => url("fir_reader_result_pdf_download"),
                "message" => "All Fir Data"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getSectionSearchResult($request)
    {
        $sectionSearchResults = array();
        foreach ($request->filterSections as $filterSection) {
            $query = Section::query();
            if (!empty($filterSection['statute_id'])) {
                $query->where('statute_id',  $filterSection['statute_id']);
            }
            if (!empty($filterSection['section'])) {
                $query->where('fir_no', 'like', '%' . $filterSection['section'] . '%');
            }
            $sectionSearchResults[] = $query->get();
        }
        return $sectionSearchResults;
    }
}