<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PetitionTalbana;
use Illuminate\Http\Request;

class PetitionTalbanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $petitionTalbana = PetitionTalbana::with('petition','attachments')->where('petition_id',$request->petition_id)->get();
             
            return response()->json(
                [
                    'records' => $petitionTalbana,
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
            if($request->talbana_date){      
                $request->merge([
                    'talbana_date' => \Carbon\Carbon::parse($request->talbana_date)->format('Y/m/d'),    
                ]);
            }
            PetitionTalbana::updateOrCreate(['id'=>$request->id],$request->except('editMode'));

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
            
            $petitionTalbana = PetitionTalbana::with('petition','attachments')->whereId($id)->first();
            

            return response()->json(
                [
                    'record' => $petitionTalbana,
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

    public function showTalbanaByPetition(Request $request)
    {
        try {
            
            $this->validate($request,[
                'petition_id'=>'required'
            ]);

             $query = PetitionTalbana::with('petition','attachments')->wherePetitionId($request->petition_id);
            
            if ($request->id>0) {
                $query->whereId($request->id);            
            }
            $petitionTalbana = $query->first();
            
            return response()->json(
                [
                    'record' => $petitionTalbana,
                    'message' => 'showTalbanaByPetition Successs',
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
