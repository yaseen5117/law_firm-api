<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RezoModule;
use App\Models\Serverable;
use Illuminate\Http\Request;

class RezoModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $query = RezoModule::select('rezo_modules.*');
            $query->orderby('rezo_modules.id','desc');
            $rezo_modules= $query->paginate(25);
            return response($rezo_modules,200);
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

            $request->merge([
                'serverable_type' =>'App\Models\RezoModule'
            ]);
            RezoModule::updateOrCreate(['id'=>$request->id],$request->only('module_type','title'));
            
            Serverable::updateOrCreate(['id'=>$request->id],$request->except('_token','module_type','title'));
            return response([
                "success"=>true
            ],200);
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RezoModule  $rezoModule
     * @return \Illuminate\Http\Response
     */
    public function show(RezoModule $rezoModule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RezoModule  $rezoModule
     * @return \Illuminate\Http\Response
     */
    public function edit(RezoModule $rezoModule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RezoModule  $rezoModule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RezoModule $rezoModule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RezoModule  $rezoModule
     * @return \Illuminate\Http\Response
     */
    public function destroy(RezoModule $rezoModule)
    {
        //
    }
}
