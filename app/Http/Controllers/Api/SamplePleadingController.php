<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\SamplePleading;
use Illuminate\Http\Request;

class SamplePleadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = SamplePleading::query()->with('attachment');
        if (!empty($request->title)) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        $sample_pleadings = $query->get();
        return response([
            'sample_pleadings' => $sample_pleadings,
            'message' => "All sample_pleadings"
        ]);
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
            $sample_pleading = SamplePleading::updateOrCreate(['id' => $request->id], $request->except('editMode', 'files'));
            //getting files from request
            $files = $request->file('files');
            if ($files) {
                foreach ($files as $key => $file) {
                    info("AttachmentController store Function: File mime_type: " . $file->getClientMimeType());
                    $name = time() . '_' . $file->getClientOriginalName();
                    $file_path = $file->storeAs('attachments/sample-pleadings/' . $sample_pleading->id . '/', $name, 'public');
                    $mime_type = $file->getClientMimeType();

                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $title = $file_name;
                    $attachmentable_type = "App\Models\SamplePleading";
                    $attachmentable_id = $sample_pleading->id;
                    Attachment::updateOrCreate(
                        [
                            'attachmentable_id' => $attachmentable_id,
                            'attachmentable_type' => $attachmentable_type
                        ],
                        [
                            'file_name' => $file_name,
                            'title' => $title,
                            'attachmentable_type' => $attachmentable_type,
                            'attachmentable_id' => $attachmentable_id,
                            'mime_type' => $mime_type,
                        ]
                    );
                }
            }
            return response()->json(
                [
                    'message' => 'Court Saved Successfully',
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
    public function show($id)
    {
        try {
            $sample_pleading = SamplePleading::with('attachment')->find($id);

            return response()->json(
                [
                    'sample_pleading' => $sample_pleading,
                    'message' => 'sample_pleading Single',
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
    public function destroy($id)
    {
        try {
            $sample_pleading = SamplePleading::find($id);
            if ($sample_pleading) {
                $sample_pleading->delete();
                return response("Deleted Successfully", 200);
            } else {
                return response('Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
