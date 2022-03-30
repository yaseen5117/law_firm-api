<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Judgement;
use Illuminate\Http\Request;

class JudgementController extends Controller
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
            if($request->date){
                $request->merge([
                    'date' => \Carbon\Carbon::parse($request->date)->format('Y/m/d'),    
                ]);
            }
            Judgement::updateOrCreate(['id'=>$request->id],$request->except('editMode'));

            return response()->json(
                [
                    'message' => 'Judgement Saved Successfully',
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

            $judgements = Judgement::where('petition_id',$id)->get();            
             
            return response()->json(
                [           
                    'index_annexure_data' => $judgements,              
                    'judgements' => $judgements,
                    'index_data' => $judgements,
                    'message' => 'Success',
                    'page_title' => "Judgements",
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
        try {             
            $record = Judgement::find($id); 
                    
            if($record){
                $record->delete();
                return response($record,200);
            }else{
                return response('Data Not Found',404);
            }
            
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }
    public function judgementDetail($id)
    {
        try {

            $judgement = Judgement::with('petition','attachments')->whereId($id)->first();
             
            return response()->json(
                [                   
                    'index_detail_data' => $judgement,
                    'model_type' => "App\Models\Judgement",
                    'petition' => $judgement->petition,                    
                    'message' => 'Success',
                    'page_title' => "Judgement Detail",
                    'code' => 200
                ]
            );
            
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }
}
