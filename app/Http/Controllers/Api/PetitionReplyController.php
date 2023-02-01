<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Petition;
use App\Models\PetitionReply;
use App\Models\PetitionReplyParent;
use Illuminate\Http\Request;
use App\Services\CasePermissionService;

class PetitionReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:admin|staff')->except(['show', 'replyDetail']);
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
            PetitionReply::updateOrCreate(['id' => $request->id], $request->except('editMode'));

            return response()->json(
                [
                    'message' => 'Petition Reply',
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
    // public function show($id)
    // {         
    //     try {
    //         $petition_replies= PetitionReply::where('petition_id', $id)->orderby('created_at','desc')->get();
    //         return response($petition_replies,200);
    //     } catch (\Exception $e) {
    //         return response([
    //             "error"=>$e->getMessage()
    //         ],500);
    //     }
    // }
    public function show($petitionReplyId)
    {
        try {
            $petition_replies = PetitionReply::where('petition_reply_parent_id', $petitionReplyId)->orderBy('display_order')->get();
            $petition_parent = PetitionReplyParent::find($petitionReplyId);

            if (empty($petition_parent)) {
                return response([
                    "message" => "Data Not Found!",
                ], 404);
            }
            $user = request()->user();
            if (!CasePermissionService::userHasCasePermission($petition_parent->petition_id, $user)) {

                return response([
                    "error" => CasePermissionService::$unauthorizedMessage,
                    "message" => CasePermissionService::$unauthorizedMessage,
                ], CasePermissionService::$unauthorizedCode);
            }
            $petition = Petition::find($petition_parent->petition_id);


            return response()->json(
                [
                    'petition_replies' => $petition_replies,
                    'index_data' => $petition_replies,
                    'petition' => $petition,
                    'petition_parent' => $petition_parent,
                    'message' => 'Success',
                    'page_title' => "Petition Reply",
                    'code' => 200
                ]
            );
            return response($petition_replies, 200);
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
    public function destroy($petitionReplyid)
    {
        try {
            $petition_reply = PetitionReply::find($petitionReplyid);

            if ($petition_reply) {
                $petition_reply->delete();
                return response($petition_reply, 200);
            } else {
                return response('Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function replyDetail($petitionReplyId)
    {
        try {

            $query = PetitionReply::with('petition_reply_parent.petition', 'attachments')->where('id', $petitionReplyId)->first();
            if (empty($query)) {
                return response([
                    "message" => "Data Not Found!",
                ], 404);
            }

            $previous_index_id = null;
            $next_index_id = null;
            if ($petitionReplyId > 0) {
                $previous_index_id = PetitionReply::where('petition_reply_parent_id', $query->petition_reply_parent_id)->where('id', '<', $petitionReplyId)->max('id');

                $next_index_id = PetitionReply::where('petition_reply_parent_id', $query->petition_reply_parent_id)->where('id', '>', $petitionReplyId)->min('id');
            }

            $petition_id = $query->petition_reply_parent->petition->id;

            $petition = Petition::withRelations()->where('id', $petition_id)->first();

            return response()->json(
                [
                    'petition_reply' => $query,
                    'petition' => $petition,
                    'previous_index_id' => $previous_index_id,
                    'next_index_id' => $next_index_id,
                    'message' => 'Success',
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
    public function update_display_order(Request $request)
    {
        foreach ($request->petition_replies as $index => $petition_reply) {

            PetitionReply::whereId($petition_reply['id'])->update([
                'display_order' => $index
            ]);
        }
        return response("Done Index Moving");
    }
}
