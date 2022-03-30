<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Petition;
use App\Models\PetitonOrderSheet;


class PetitionOrderSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $petitionOrderSheets = PetitonOrderSheet::with('petition','attachments')->where('petition_id',$request->petition_id)->get();
             
            return response()->json(
                [
                    'records' => $petitionOrderSheets,
                    'message' => 'Successs',
                    'code' => 200
                ]
            );            
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
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
            
            if($request->order_sheet_date){ 
                $request->merge([
                    'order_sheet_date' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->order_sheet_date)->format('Y/m/d'),    
                ]);
            }
            //return response($request->order_sheet_date,404);
            PetitonOrderSheet::updateOrCreate(['id'=>$request->id],$request->except('editMode'));

            return response()->json(
                [
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
            
            $petitionOrderSheet = PetitonOrderSheet::with('petition','attachments')->whereId($id)->first();
            

            return response()->json(
                [
                    'record' => $petitionOrderSheet,
                    'message' => 'Successs',
                    'code' => 200
                ]
            );            
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }

    public function showOrderSheetByPetition(Request $request)
    {
        try {
            
            $this->validate($request,[
                'petition_id'=>'required'
            ]);

             $query = PetitonOrderSheet::with('petition','attachments')->wherePetitionId($request->petition_id);
            
            if ($request->id>0) {
                $query->whereId($request->id);            
            }
            $petitionOrderSheet = $query->first();
            
            return response()->json(
                [
                    'record' => $petitionOrderSheet,
                    'message' => 'showOrderSheetByPetition Successs',
                    'code' => 200
                ]
            );            
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
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
        //
    }
}
