<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PetitionModuleType;
use App\Models\PetitionNaqalForm;
use Illuminate\Http\Request;

class NaqalFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:admin')->only(['store','destroy']);
    }
    
    public function index(Request $request)
    {
        try {             
            $PetitionNaqalForm = PetitionNaqalForm::with('petition','attachments')->where('petition_id',$request->petition_id)->get();
             
            return response()->json(
                [
                    'records' => $PetitionNaqalForm,
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
            if($request->naqal_form_date){ 
                $request->merge([
                    'naqal_form_date' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->naqal_form_date)->format('Y/m/d'),   
                ]);
            }
            if(!$request->naqal_form_type_id){
                $request->merge([
                    'naqal_form_type_id' => 1, 
                ]);
            }
            $PetitionNaqalForm = PetitionNaqalForm::updateOrCreate(['id'=>$request->id],$request->except('editMode','petition','attachments'));

            return response()->json(
                [
                    'PetitionNaqalForm' => $PetitionNaqalForm,
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
            
            $PetitionNaqalForm = PetitionNaqalForm::with('petition','attachments','naqal_form_types')->whereId($id)->first();
            

            return response()->json(
                [
                    'record' => $PetitionNaqalForm,
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

    public function showNaqalFormByPetition(Request $request)
    {
        try {
            
            $this->validate($request,[
                'petition_id'=>'required'
            ]);

             $query = PetitionNaqalForm::with('petition','attachments','naqal_form_types')->wherePetitionId($request->petition_id);
            
            if ($request->id>0) {
                $query->whereId($request->id);            
            }
            $PetitionNaqalForm = $query->first();
            
            return response()->json(
                [
                    'record' => $PetitionNaqalForm,
                    'message' => 'showNaqalFormByPetition Successs',
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
            $naqalForm = PetitionNaqalForm::find($id);
            if ($naqalForm) {
                $naqalForm->delete();
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
    public function getNaqalFormTypes(Request $request)
    {         
        try {               
            $query = PetitionModuleType::query();
            if(!empty($request->module_id)){                  
                $query->where('module_id', $request->module_id);
            }   
            $naqalFormTypes = $query->orderby('display_order','desc')->get();
            return response()->json(
                [
                    'naqalFormTypes' => $naqalFormTypes,
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
}
