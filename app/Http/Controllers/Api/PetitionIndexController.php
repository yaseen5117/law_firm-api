<?php

namespace App\Http\Controllers\Api;

use App\Models\PetitionIndex;
use App\Models\Petition;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\PdfService;

class PetitionIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:admin|staff|lawyer')->only(['store', 'destroy']);
    }
    public function index()
    {
        try {
            $petition_index = PetitionIndex::orderby('created_at', 'desc')->get();
            return response($petition_index, 200);
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
            if ($request->date) {
                $request->merge([
                    'date' => toDBDate($request->date), //\Carbon\Carbon::createFromFormat('d/m/Y', $request->date)->format('Y/m/d'),
                ]);
            }

            if (is_null($request->id)) {
                $max_display_order = PetitionIndex::where('petition_id', $request->petition_id)->max('display_order');

                /*return response([
                    "max_display_order" => $max_display_order
                ], 500);*/

                $request->merge(
                    [
                        'display_order' => $max_display_order + 1,
                    ]
                );
            }

            PetitionIndex::updateOrCreate(['id' => $request->id], $request->except('editMode', 'petition', 'attachments'));

            return response()->json(
                [
                    'message' => 'Petitions',
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
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function show($petitionIndex)
    {
        try {
            $petitionIndex = PetitionIndex::with('petition', 'attachments')->whereId($petitionIndex)->first();

            $previous_index_id = PetitionIndex::with('petition', 'attachments')->where('id', '<', $petitionIndex->id)->max('id');

            $next_index_id = PetitionIndex::with('petition', 'attachments')->where('id', '>', $petitionIndex->id)->min('id');

            $petition = Petition::withRelations()->whereId($petitionIndex->petition_id)->first();

            return response()->json(
                [
                    'petition' => $petition,
                    'petition_index' => $petitionIndex,
                    'next_index_id' => $next_index_id,
                    'previous_index_id' => $previous_index_id,
                    'message' => 'Success',
                    'code' => 200,
                ]
            );
            return response($petitionIndex, 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /* Show the form for editing the specified resource.
     *
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function edit(PetitionIndex $petitionIndex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PetitionIndex $petitionIndex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function destroy($petitionIndexId)
    {
        try {
            $petition_index = PetitionIndex::find($petitionIndexId);

            if ($petition_index) {
                $petition_index->delete();
                return response($petition_index, 200);
            } else {
                return response('Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function update_display_order(Request $request)
    {
        /*$petiions_index = collect($0);
        $petiions_index = $petiions_index->pluck('id')->all();*/


        foreach ($request->petition_details as $index => $petition_detail) {

            PetitionIndex::whereId($petition_detail['id'])->update([
                'display_order' => $index
            ]);
        }
        return response("done");
    }
    public function downloadSingleIndexAsPdf(Request $request)
    {
        $pdfService = new PdfService;

        $case_no = $request->petition["case_no"];
         
        $attachments = $request->attachments;
        $petition_id = $request->petition_id;
        $index_id = $request->id;
        $index_name = "PetitionIndex";

        $file_path = "storage/attachments/petitions/$petition_id/$index_name/$index_id/";

        $downloaded_folder_name = "petition-indexes-pdf";
        $downloaded_file_name = $case_no . "_" . $index_id . ".pdf";


        $file_path = $pdfService->convertImagesToPdf($attachments, $file_path, $downloaded_folder_name, $downloaded_file_name);

        return response([
            "file_path" => $file_path,
            "message" => "Downloaded File Saved Successfully."
        ], 200);
    }
}
