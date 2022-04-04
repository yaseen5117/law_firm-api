<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PetitionHearing;
use Illuminate\Http\Request;

class PetitionHearingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];
        $petitionHearings = PetitionHearing::all();
            foreach($petitionHearings as $petitionHearing){
                $events[] = [
                    'id' => @$petitionHearing->id,
                    'title' => 'Case # '.@$petitionHearing->petition->case_no,
                    'start' => $petitionHearing->hearing_date,   
                    'hearing_date' => $petitionHearing->hearing_date,   
                    'hearing_summary' => $petitionHearing->hearing_summary,   
                    'petition_id' => $petitionHearing->petition_id,   
                    
                ];
            }
        return response([
            'events' => $events,
            'server_time' => date("d/M/Y h:i A"),
        ]);  
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
        //return $request->all();
        $request->merge([
            'hearing_date' => date("Y-m-d",strtotime($request->hearing_date)),
        ]);
        PetitionHearing::updateOrCreate(['id'=>$request->id],$request->all());
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
            $petitionHearing = PetitionHearing::find($id); 
                    
            if($petitionHearing){
                $petitionHearing->delete();
                return response($petitionHearing,200);
            }else{
                return response('Record Not Found',404);
            }
            
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }
}
