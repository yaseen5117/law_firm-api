<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\GeneralCaseLaw;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\all;

class GeneralCaseLawController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin|staff')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $query = GeneralCaseLaw::with('attachment');

            if (!empty($request->case_title)) {
                $query->where('case_title', 'like', '%' . $request->case_title . '%');
            }

            if (!empty($request->keywords)) {
                $query->where('keywords', 'like', '%' . $request->keywords . '%');
            }

            $generalcaseLaws = $query->get();

            return response()->json(
                [
                    'general_case_Laws' => $generalcaseLaws,
                    'message' => 'Success',
                    'page_title' => "General Case Laws",
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
            $request->merge([
                'slug' => Str::slug($request->case_title)
            ]);

            GeneralCaseLaw::updateOrCreate(['id' => $request->id], $request->except('editMode', 'attachment', 'plain_content'));

            return response()->json(
                [
                    'message' => 'General Case Law Saved Successfully',
                    'code' => 200
                ],
                200
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

            $caseLaws = GeneralCaseLaw::with('attachment')->find($id);
            //$petitionReply = PetitionReply::with('petition','attachments')->where('petition_reply_parent_id',$petitionReplyId)->get();

            return response()->json(
                [
                    'index_annexure_data' => $caseLaws,
                    'case_laws' => $caseLaws,
                    'index_data' => $caseLaws,
                    'message' => 'Success',
                    'page_title' => "Frequently Asked Legal Propositions",
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
            $record = GeneralCaseLaw::find($id);
            $attachment = Attachment::where('attachmentable_id', $record->id)->where('attachmentable_type', "App\Models\GeneralCaseLaw")->first();

            if ($attachment) {
                $public_path =  public_path();
                $file_path = $public_path . '/storage/attachments/Frequently-Asked-Legal-Propositions/' . $record->id;
                if (File::exists($file_path)) {
                    File::deleteDirectory($file_path);
                }
                Attachment::where('id', $attachment->id)->forceDelete();
            }
            if ($record) {
                $record->delete();
                return response($record, 200);
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
