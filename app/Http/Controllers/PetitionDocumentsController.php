<?php

namespace App\Http\Controllers;

use App\Models\PetitionDocument;
use App\Models\Sample;
use Illuminate\Http\Request;
use Session;
use Storage;

class PetitionDocumentsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $directory="petition_documents.";
    private $title_singular="Petition Document";
    private $title_prural="Petition Documents";
    private $route_name="petition_documents";
    private $model;


    public function __construct()
    {
        $this->model = new PetitionDocument();
    }

    public function index()
    {

        $data['title_singular']=$this->title_singular;
        $data['title_prural']=$this->title_prural;
        $data['route_name']=$this->route_name;
        $data['records']=$this->model::orderby('display_order')->paginate(10);
        return view($this->directory."index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        $data['title_singular']=$this->title_singular;
        $data['title_prural']=$this->title_prural;
        $data['route_name']=$this->route_name;
        $data['directory']=$this->directory;
        $data['petition_id'] = $request->petition_id;
        //$data['rates']=Rate::orderby('display_order')->get();;
        
        return view($this->directory."create",$data);
    }
    public function moveFile($from_directory, $to_directory)
    {
        if (Storage::exists($from_directory)) {
            Storage::move($from_directory, $to_directory);
        }
    }
    public function store(Request $request)
    {
        try {            
            
            $this->validatePetitionDocuments($request);
          
            if (Session::has('file.petition_document_file')) {
                $request->merge(['file_name' => Session::get('file.petition_document_file')]);
                $this->moveFile('petitions/' . Session::get('file.petition_document_file'), 'petitions/' . request()->petition_id . '/' . Session::get('file.petition_document_file'));
            }  
            
            $record=$this->model::query()->create($request->except('_token','rates','petition_document_file'));
            /*$rates_data=[];
            if (count($request->rates)>0) {
                DeliveryPointRate::where('delivery_point_id',$record->id)->delete();
                foreach ($request->rates as $key => $value) {
                    $rates_data['rate_id']=$key;
                    $rates_data['active']=isset($value['active'])?1:0;
                    $rates_data['price']=isset($value['price'])?:0;
                    $rates_data['delivery_point_id']=$record->id;
                    DeliveryPointRate::create($rates_data);
                }
            }*/

            $request->session()->flash('success', 'Created successfully!');
            
            //return redirect(route($this->route_name.".create"));

        } catch (Exception $e) {
            
            $request->session()->flash('error', $e->getMessage());
            
            return redirect(route($this->route_name.".index"));
        }
    }

    public function validatePetitionDocuments(Request $request){
        $validations = [
            'title' => 'required|max:190',
            //'petition_document_file' => 'required', 
        ];

        return request()->validate($validations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['directory']=$this->directory;
        $data['title_singular']=$this->title_singular;
        $data['title_prural']=$this->title_prural;
        $data['route_name']=$this->route_name;
        $data['record']=$this->model::find($id);       
        //$data['rates']=Rate::orderby('display_order')->get();;
        return view($this->directory."edit",$data);


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
        //dd($request->all());

        
        $record = $this->model::query()->findOrFail($id);
        /*$rates_data=[];
        if (count($request->rates)>0) {
            DeliveryPointRate::where('delivery_point_id',$record->id)->delete();
            foreach ($request->rates as $key => $value) {
                $rates_data['rate_id']=$key;
                $rates_data['active']=isset($value['active'])?1:0;
                $rates_data['price']=$value['price'];
                $rates_data['delivery_point_id']=$record->id;
                DeliveryPointRate::create($rates_data);
            }
        }*/

        if (Session::has('file.petition_document_file')) {
            $request->merge(['file_name' => Session::get('file.petition_document_file')]);
            $this->moveFile('petitions/' . Session::get('file.petition_document_file'), 'petitions/' . request()->petition_id . '/' . Session::get('file.petition_document_file'));
        }  
        $request->merge([
            'petition_id' => $record->petition_id,
        ]);

        try {
            $record->update($request->except('_token', '_method','rates','petition_document_file'));
            $request->session()->flash('success', 'Updated successfully!');
            return redirect(route($this->directory.".create"));
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return redirect(route($this->route_name.".index"));
        }
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
            $this->model::destroy($id);
            return response()->json('success', 200);
        } catch (\Exception $e) {
            return response()->json('error', $e->getCode());
        }
    }
    
    public function uploadPetitionDocuments(Request $request)
    {    
        try {
            if ($request->hasFile('petition_document_file')) {            
                $fileNameToStore = storeFile($request->file('petition_document_file'), $request->petition_id, 'petitions');
                Session::put('file.petition_document_file', $fileNameToStore);
            }
        } catch (\Exception $e) {
            return response()->json('error', $e->getCode());
        }            
    }
    public function fetchPetitionDocuments(Request $request)
    {        
        $petition_documents = PetitionDocument::where('petition_id', $request->petition_id)->get();
        return response()->json([
            'petition_documents' => $petition_documents,
        ]);
    }
}
