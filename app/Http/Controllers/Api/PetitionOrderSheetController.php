<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\OrderSheetType;
use Illuminate\Http\Request;
use App\Models\Petition;
use App\Models\PetitionModuleType;
use App\Models\PetitonOrderSheet;
use File;

class PetitionOrderSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:admin')->only(['']);
    }
    public function index(Request $request)
    {
        try {
            $petitionOrderSheets = PetitonOrderSheet::with('attachments', 'order_sheet_types')->where('petition_id', $request->petition_id)->orderby('order_sheet_date', 'asc')->get();

            return response()->json(
                [
                    'records' => $petitionOrderSheets,
                    'message' => 'Successs',
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

            if ($request->order_sheet_date) {
                $request->merge([
                    'order_sheet_date' => toDBDate($request->order_sheet_date), //\Carbon\Carbon::createFromFormat('d/m/Y', $request->order_sheet_date)->format('Y/m/d'),
                ]);
            }
            $petitionOrderSheet = PetitonOrderSheet::updateOrCreate(['id' => $request->id], $request->except('editMode', 'petition', 'attachments', 'order_sheet_types', 'next_hearing_date'));
            $next_hearing_order_sheet = null;
            if ($request->next_hearing_date) {
                $request->merge([
                    'order_sheet_date' => toDBDate($request->next_hearing_date),
                ]);

                $next_hearing_order_sheet = PetitonOrderSheet::updateOrCreate(['order_sheet_date' => $request->order_sheet_date], $request->except('editMode', 'petition', 'attachments', 'order_sheet_types', 'order_sheet_type_id', 'next_hearing_date', 'id'));
            }

            return response()->json(
                [
                    'petitionOrderSheet' => $petitionOrderSheet,
                    'next_hearing_order_sheet' => $next_hearing_order_sheet,
                    'message' => 'Saved successfully',
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

            $petitionOrderSheet = PetitonOrderSheet::with('attachments')->whereId($id)->first();

            return response()->json(
                [
                    'record' => $petitionOrderSheet,
                    'message' => 'Successs',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function showOrderSheetByPetition(Request $request)
    {
        try {

            $this->validate($request, [
                'petition_id' => 'required'
            ]);

            $query = PetitonOrderSheet::with('petition', 'petition.court', 'attachments', 'order_sheet_types')->wherePetitionId($request->petition_id);
            $previous_index_id = null;
            $next_index_id = null;
            if ($request->id > 0) {
                $query->whereId($request->id);
                $previous_index_id = PetitonOrderSheet::with('petition', 'attachments')->wherePetitionId($request->petition_id)->where('id', '<', $request->id)->max('id');

                $next_index_id = PetitonOrderSheet::with('petition', 'attachments')->wherePetitionId($request->petition_id)->where('id', '>', $request->id)->min('id');
            }
            $petitionOrderSheet = $query->orderBy('order_sheet_date', 'desc')->first();

            //return response($next_index_id, 403);
            return response()->json(
                [
                    'record' => $petitionOrderSheet,
                    'previous_index_id' => $previous_index_id,
                    'next_index_id' => $next_index_id,
                    'message' => 'show OrderSheetByPetition Successs',
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
            $orderSheet = PetitonOrderSheet::find($id);
            if ($orderSheet) {
                $attachment =  Attachment::where('attachmentable_id', $orderSheet->id)->where('attachmentable_type', "App\Models\PetitonOrderSheet")->get();

                if ($attachment) {
                    $public_path =  public_path();
                    $file_path = $public_path . '/storage/attachments/petitions/' . $orderSheet->petition_id . '/PetitonOrderSheet/' . $orderSheet->id;

                    if (File::exists($file_path)) {
                        File::deleteDirectory($file_path);
                    }
                    Attachment::where('attachmentable_id', $orderSheet->id)->where('attachmentable_type', "App\Models\PetitonOrderSheet")->forceDelete();
                }
                $orderSheet->delete();
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
    public function getOrderSheetTypes(Request $request)
    {
        try {
            $query = PetitionModuleType::query();
            if (!empty($request->module_id)) {
                $query->where('module_id', $request->module_id);
            }
            $orderSheetTypes = $query->orderby('title')->get();
            return response()->json(
                [
                    'orderSheetTypes' => $orderSheetTypes,
                    'message' => 'Successs',
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
