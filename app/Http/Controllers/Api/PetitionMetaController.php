<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PetitionMeta;
use Illuminate\Http\Request;

class PetitionMetaController extends Controller
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
            if ($request->date) {
                $request->merge([
                    'date' => toDBDate($request->date), //\Carbon\Carbon::createFromFormat('d/m/Y', $request->date)->format('Y/m/d'),
                ]);
            }

            PetitionMeta::updateOrCreate(
                [
                    'created_by' => auth()->user()->id,
                    'id' => $request->id]
                , $request->except('editMode')
            );

            return response()->json(
                [
                    'message' => 'Case Law Saved Successfully',
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

            $caseLaws = PetitionMeta::with('author')->where('petition_id', $id)->orderBy('display_order')->get();
            //$petitionReply = PetitionReply::with('petition','attachments')->where('petition_reply_parent_id',$petitionReplyId)->get();

            return response()->json(
                [
                    'index_annexure_data' => $caseLaws,
                    'case_laws' => $caseLaws,
                    'index_data' => $caseLaws,
                    'page_setup' => [
                        'hide_annexure_column' => true,
                        'hide_page_column' => true,
                    ],
                    'model_type' => "App\Models\PetitionMeta",
                    'message' => 'Success',
                    'page_title' => "Petition Meta",
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
            $record = PetitionMeta::find($id);

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
    public function detail($id)
    {
        try {

            $data = PetitionMeta::with('petition', 'petition.court', 'attachments', 'author')->whereId($id)->first();

            return response()->json(
                [
                    'index_detail_data' => $data,
                    'model_type' => "App\Models\PetitionMeta",
                    'petition' => $data->petition,
                    'message' => 'Success',
                    'page_title' => "Case Interviews & NDA",
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
