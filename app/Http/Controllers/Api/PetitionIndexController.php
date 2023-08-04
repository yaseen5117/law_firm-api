<?php

namespace App\Http\Controllers\Api;

use App\Models\PetitionIndex;
use App\Models\Petition;
use Illuminate\Http\Request;
use PDF;
use App\Http\Controllers\Controller;

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
        // Process the received images data and create a PDF
        // Replace this with your logic to create the PDF
        $indexData = $request;
        $pdf = PDF::loadView('petition_pdf.download_index_images_as_pdf', compact("indexData"));

        // Return the PDF as a response
        return $pdf->download('images.pdf');

        // foreach ($request->attachments as $image) {
        //     $file_name = $image["file_name"];
        //     $public_path =  public_path();
        //     $file_path = $public_path . '/storage/attachments/petitions/' . $request->petition_id . '/PetitionIndex/' . $image['attachmentable_id'] . '/' . $file_name;

        //     $imageData = file_get_contents($file_path);
        //     $base64Image = base64_encode($imageData);
        //     $imageTag = '<img src="data:image/jpeg;base64,' . $base64Image . '"/>';
        //     $pdf->loadHtml($imageTag);
        //     $pdf->setPaper('A4', 'portrait');
        //     $pdf->render();
        // }
        // // Generate a unique filename for the PDF
        // $pdfFileName = Str::random(10) . '.pdf';
        // $pdfFilePath = public_path('pdf/' . $pdfFileName);

        // // Save the PDF to the specified file path
        // file_put_contents($pdfFilePath, $pdf->output());

        // // Return the path to the generated PDF
        // return $pdfFilePath;
    }
}
