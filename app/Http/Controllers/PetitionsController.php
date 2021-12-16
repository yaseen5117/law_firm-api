<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use App\Models\PetitionStatus;
use App\Models\PetitionLawyer;
use App\Models\PetitionJudge;
use App\Models\CaseType;
use App\Models\User;
use App\Models\Court;
use Illuminate\Http\Request;

class PetitionsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $directory="petitions.";
    private $title_singular="Petitions";
    private $title_prural="Petitions";
    private $route_name="petitions";
    private $model;


    public function __construct()
    {
        $this->model = new Petition;
    }

    public function index(Request $request)
    {

        $data['title_singular']=$this->title_singular;
        $data['title_prural']=$this->title_prural;
        $data['route_name']=$this->route_name;
        $data['courts']=Court::orderby('display_order')->get();
        $data['clients']=User::role('client')->orderby('first_name')->get(); 
         
        $query =$this->model::where('name','Like', '%'.$request->title.'%');

        if(isset($request->client_id))
        {
            $query  = $data['records']->where('client_id','=',$request->client_id);
        }

        if(isset($request->court_id))
        {
            $query->where('court_id','=',$request->court_id);           
        }
            
        $data['records']=$query->orderby('display_order')->paginate(10);

        return view($this->directory."index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data['title_singular']=$this->title_singular;
        $data['title_prural']=$this->title_prural;
        $data['route_name']=$this->route_name;
        $data['directory']=$this->directory;
        $data['clients']=User::role('client')->orderby('first_name')->get();
        $data['petition_status']=PetitionStatus::orderby('display_order')->get();
        $data['courts']=Court::orderby('display_order')->get();
        $data['case_types']=CaseType::orderby('display_order')->get();
        $data['judges']=User::role('judge')->orderby('first_name')->get(); 
        $data['lawyers']=User::role('lawyer')->orderby('first_name')->get();

        return view($this->directory."create",$data);
    }

    public function store(Request $request)
    {
        try {

             if($request->check_client_cb)
             {
                 $client_id = $request->client_id;
             }
             else
             {

                $ClientUser = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => bcrypt('test1234'),           
                ]);

                $ClientUser->assignRole('client');
                

                $client_id = $ClientUser->id;
             }

             
            $request->merge([
                    'client_id'=>$client_id
            ]);  
            
            $record=$this->model::query()->create($request->except('_token','first_name','last_name','email','password','phone','check_client_cb','judges', 'lawyers'));
          
              if($request->lawyers)
              {
                foreach($request->lawyers as $lawyer)
                 {
                    PetitionLawyer::create([
                        'petition_id' => $record->id,
                        'lawyer_id' => $lawyer,          
                    ]);
                 }
              }

              if($request->judges)
              {
                 foreach($request->judges as $judge)
                 {
                    PetitionJudge::create([
                        'petition_id' => $record->id,
                        'judge_id' => $judge,
                                 
                    ]);
                 }
              }

            $request->session()->flash('success', 'Created successfully!');

            return redirect(route($this->route_name.".index"));

        } catch (Exception $e) {
            
            $request->session()->flash('error', $e->getMessage());
            
            return redirect(route($this->route_name.".index"));
        }
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
        $data['clients']=User::role('client')->orderby('first_name')->get();
        $data['petition_status']=PetitionStatus::orderby('display_order')->get();
        $data['courts']=Court::orderby('display_order')->get();
        $data['petition_id']=$id;

        $data['case_types']=CaseType::orderby('display_order')->get();
        $data['judges']=User::role('judge')->orderby('first_name')->get(); 
        $data['lawyers']=User::role('lawyer')->orderby('first_name')->get();
 
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
        try {
             
             if($request->check_client_cb)
             {
                 $client_id = $request->client_id;
             }
             else
             {
                $ClientUser = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => bcrypt('test1234'),           
                ]);
                $ClientUser->assignRole('client');
                $client_id = $ClientUser->id;
             }

             $request->merge([
                    'client_id'=>$client_id
             ]);

             $record = $this->model::query()->findOrFail($id);
             $record->update($request->except('_token','first_name','last_name','email','password','phone','check_client_cb','judges', 'lawyers'));

              if($request->lawyers)
              {
                $checkLawyerPetition = PetitionLawyer::where('petition_id', '=', $id)->get();
                if($checkLawyerPetition)
                {
                    PetitionLawyer::where('petition_id', '=', $id)->delete();
                }
                
                foreach($request->lawyers as $lawyer)
                 {
                    
                    PetitionLawyer::create([
                        'petition_id' => $id,
                        'lawyer_id' => $lawyer,          
                    ]);
                    
                 }
              }

              if($request->judges)
              {
                $checkJudgePetition = PetitionJudge::where('petition_id', '=', $id)->get();
                if($checkJudgePetition)
                {
                    PetitionJudge::where('petition_id', '=', $id)->delete();
                }
                
                foreach($request->judges as $judge)
                {
                    
                    PetitionJudge::create([
                        'petition_id' => $id,
                        'judge_id' => $judge,
                                 
                    ]);
                    
                }
              }

          
            $request->session()->flash('success', 'Updated successfully!');
            return redirect(route($this->route_name.".index"));
        } 
        catch (\Exception $e) 
        { 
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
    public function destroy(Request $request,$id)
    {
        try {
            $this->model::destroy($id);
            return response()->json('success', 200);
        } catch (\Exception $e) {
            return response()->json('error', $e->getCode());
        }
    }
}
