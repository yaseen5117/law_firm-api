<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderSheetType;
use Illuminate\Http\Request;
use App\Models\Petition;
use App\Models\PetitionModuleType;
use App\Models\PetitonOrderSheet;


class PetitionOrderSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:admin')->only(['destroy']);
    }
    public function index(Request $request)
    {
        try {
            $petitionOrderSheets = PetitonOrderSheet::with('petition', 'attachments')->where('petition_id', $request->petition_id)->orderby('order_sheet_date', 'desc')->get();

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
                    'order_sheet_date' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->order_sheet_date)->format('Y/m/d'),
                ]);
            }
            if (!$request->order_sheet_type_id) {
                $request->merge([
                    'order_sheet_type_id' => 1,
                ]);
            }
            //return response($request->order_sheet_date,404);
            $petitionOrderSheet = PetitonOrderSheet::updateOrCreate(['id' => $request->id], $request->except('editMode', 'petition', 'attachments', 'order_sheet_types'));

            return response()->json(
                [
                    'petitionOrderSheet' => $petitionOrderSheet,
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

            $petitionOrderSheet = PetitonOrderSheet::with('petition', 'attachments', 'order_sheet_types')->whereId($id)->first();


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

            $query = PetitonOrderSheet::with('petition', 'attachments')->wherePetitionId($request->petition_id);
            $previous_index_id = null;
            $next_index_id = null;
            if ($request->id > 0) {
                $query->whereId($request->id);
                $previous_index_id = PetitonOrderSheet::with('petition', 'attachments')->where('id', '<', $request->id)->max('id');

                $next_index_id = PetitonOrderSheet::with('petition', 'attachments')->where('id', '>', $request->id)->min('id');
            }
            $petitionOrderSheet = $query->orderBy('order_sheet_date', 'desc')->first();

            //return response($next_index_id, 403);
            return response()->json(
                [
                    'record' => $petitionOrderSheet,
                    'previous_index_id' => $previous_index_id,
                    'next_index_id' => $next_index_id,
                    'message' => 'showOrderSheetByPetition Successs',
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
