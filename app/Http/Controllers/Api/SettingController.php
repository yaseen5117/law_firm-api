<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Company;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:admin')->except(['index']);
    }
    public function index()
    {
        try {

            $setting = Setting::getSetting();

            if (empty($setting["additionalemails"])) {
                $setting["additionalemails"] = [];
            }

            return response([
                'setting' => count($setting) > 0 ? $setting : ['site_name' => ""],
                'message' => 'all settings data',
                'code' => 200
            ]);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
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
        //return $request;
        try {

            // $additional_emails_collection = collect($request->additionalemails);
            // $additional_emails_arr = $additional_emails_collection->pluck('additional_email')->all();
            // $request->merge(
            //     ['additionalemails' => $additional_emails_arr]
            // );
            //return response($additional_emails_arr,422);
            //logged in user
            $user = request()->user();
            $setting = Setting::find($user->company_id);
            $setting->setMeta($request->all());
            $setting->save();
            return response("Success", 200);
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
        //
    }
    // public function deleteAdditionalEmail(Request $request)
    // {         
    //     $setting = Setting::find(1)->getMeta()->toArray();
    //     if ($request->index) {
    //         unset($setting['additionalemails'][$request->index]);               
    //         return response([      
    //             'additional_emails' => $setting['additionalemails'],       
    //             'message' => 'Deleted Successfully!',
    //             'code' => 200
    //         ]);
    //     }else{
    //         return response([             
    //             'message' => 'Not Found',
    //             'code' => 404
    //         ]);
    //     }


    //     // $is = in_array($request->email, $setting['additionalemails']);
    //     // return $is;
    // }
}
