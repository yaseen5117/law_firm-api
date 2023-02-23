<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseLaw;
use App\Models\ExtraDocument;
use App\Models\Judgement;
use Illuminate\Http\Request;
use App\Models\OralArgument;
use App\Models\Petition;

class OralArgumentsController extends Controller
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
            OralArgument::updateOrCreate(['id' => $request->id], $request->except('editMode'));

            return response()->json(
                [
                    'message' => 'OralArgument',
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

            $oralArguments = OralArgument::where('petition_id', $id)->orderBy('display_order')->get();
            //$petitionReply = PetitionReply::with('petition','attachments')->where('petition_reply_parent_id',$petitionReplyId)->get();

            return response()->json(
                [
                    'index_annexure_data' => $oralArguments,
                    'oral_arguments' => $oralArguments,
                    'index_data' => $oralArguments,
                    'compactInlineView' => true,
                    'ShowOnOralArgument' => true,
                    'model_type' => "App\Models\OralArgument",
                    'message' => 'Success',
                    'page_title' => "Oral Arguments",
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
            $record = OralArgument::find($id);

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
    public function oralArgumentDetail($id)
    {
        try {

            $oralArguments = OralArgument::with('petition', 'petition.court', 'attachments')->whereId($id)->first();
            //$petition = Petition::withRelations()->whereId($oralArguments->petition_id)->first();

            //$petitionReply = PetitionReply::with('petition','attachments')->where('petition_reply_parent_id',$petitionReplyId)->get();

            return response()->json(
                [
                    'index_detail_data' => $oralArguments,
                    'model_type' => "App\Models\OralArgument",
                    'petition' => $oralArguments->petition,
                    'message' => 'Success',
                    'page_title' => "Oral Arguments Detail",
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function update_display_order(Request $request)
    {
        $model_type = substr($request->model_type, strpos($request->model_type, "'\'") + 11);

        foreach ($request->index_data as $index => $single_index_data) {
            if ($model_type == "OralArgument") {
                OralArgument::whereId($single_index_data['id'])->update([
                    'display_order' => $index
                ]);
            }
            if ($model_type == "CaseLaw") {
                CaseLaw::whereId($single_index_data['id'])->update([
                    'display_order' => $index
                ]);
            }
            if ($model_type == "ExtraDocument") {
                ExtraDocument::whereId($single_index_data['id'])->update([
                    'display_order' => $index
                ]);
            }
            if ($model_type == "Judgement") {
                Judgement::whereId($single_index_data['id'])->update([
                    'display_order' => $index
                ]);
            }
        }
        return response("Done Index Moving");
    }
}
