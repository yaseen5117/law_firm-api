<?php

namespace App\Http\Controllers;

use App\Models\Shuttle;
use Illuminate\Http\Request;

class ShuttleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $directory="shuttles.";
    private $title_singular="Shuttle";
    private $title_prural="Shuttles";
    private $route_name="admin.shuttles";
    public function index()
    {

        $data['title_singular']=$this->title_singular;
        $data['title_prural']=$this->title_prural;
        $data['route_name']=$this->route_name;
        $data['records']=Shuttle::orderby('display_order')->get();
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
        //$data['rates']=Rate::orderby('display_order')->get();;
        
        return view($this->directory."create",$data);
    }

    public function store(Request $request)
    {
        try {
            
            

            $record=Shuttle::query()->create($request->except('_token','rates'));
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
        $data['record']=Shuttle::find($id);
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

        
        
        $record = Shuttle::query()->findOrFail($id);
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
        
        try {
            $record->update($request->except('_token', '_method','rates'));
            $request->session()->flash('success', 'Updated successfully!');
            return redirect(route($this->route_name.".index"));
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
            Shuttle::destroy($id);
            return response()->json('success', 200);
        } catch (\Exception $e) {
            return response()->json('error', $e->getCode());
        }
    }
}
