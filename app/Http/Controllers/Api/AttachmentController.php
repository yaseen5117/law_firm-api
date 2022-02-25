<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            $fileUpload = new Attachment();
            if ($request->file()) {
                $name = time() . '_' . $request->file->getClientOriginalName();
                $file_path = $request->file('file')->storeAs('attachments/' . $request->attachmentable_id, $name, 'public');

                $fileUpload->file_name = time() . '_' . $request->file->getClientOriginalName();
                $fileUpload->title = $fileUpload->file_name;
                //$fileUpload->path = '/storage/' . $file_path;
                $fileUpload->attachmentable_type = 'App\Models\PetitionIndex';
                $fileUpload->attachmentable_id = $request->attachmentable_id;
                $fileUpload->mime_type = $request->file->getClientMimeType();
                $fileUpload->save();

                return response()->json([
                    'success' => 'File uploaded successfully.',
                    'file_data' => $fileUpload,
                    'code' => 200,
                ]);
            }
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
        //
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
        try {
            $attachment = Attachment::find($id);
            if ($attachment) {
                $attachment->update([
                    'title' => $request->title,
                    'display_order' => $request->display_order,
                ]);
                return response(
                    [
                        'message' => 'Record updated successfully',
                        'attachment' => $attachment,
                        'code' => 200
                    ]
                );
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
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
            $attachment = Attachment::find($id);
            if ($attachment) {
                $attachment->delete();
                return response(
                    [
                        'message' => 'Record Deleted successfully',    
                        'code' => 200                    
                    ]
                );
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
