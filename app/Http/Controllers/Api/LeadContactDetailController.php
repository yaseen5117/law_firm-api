<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeadContactDetail;

class LeadContactDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Im in Controller Index";

        try {
            $lead_contact_details = LeadContactDetail::all();
            return response($lead_contact_details,200);
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
        return "Im in Controller Create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return "Im in Controller Store";

        try {
            LeadContactDetail::updateOrCreate(['id'=>$request->id],$request->except('_token',));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Im in Controller Show";
        
        try {
            $lead_contact_detail = LeadContactDetail::findorfail($id);
            return response($lead_contact_detail,200);
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
        LeadContactDetail::findorfail($id)->delete();
        return "Lead Contact Detail deleted successfully!";
    }
}
