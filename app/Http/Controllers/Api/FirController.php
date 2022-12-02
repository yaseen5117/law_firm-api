<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fir;
use App\Models\FirStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $firs = Fir::with("status", "court")->get();
            return response([
                "firs" => $firs,
                "message" => "All Fir Data"
            ], 200);
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
        try {
            //validate data 
            $validator = Validator::make($request->all(), [
                'section' => 'required|max:190',
                'arrest_info' => 'max:190',
                'warrent_info' => 'max:190',
                'bailable_info' => 'max:190',
                'compoundable_info' => 'max:190',
                'punishment_info' => 'max:190',
            ]);
            if ($validator->fails()) {
                return response()->json(
                    [
                        "validation_error" => $validator->errors(),
                    ],
                    422
                );
            }
            //return response($request->all(), 403);
            Fir::updateOrCreate(['id' => $request->id], $request->except(''));

            return response()->json(
                [
                    'message' => 'Fir Data Saved Successfully',
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
    public function show($fir_id)
    {
        try {
            $firData = Fir::find($fir_id);

            return response([
                "firData" => $firData,
                "message" => "Single Fir Data"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
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
    public function destroy($fir_id)
    {
        try {
            $fir_data = Fir::find($fir_id);

            if ($fir_data) {
                $fir_data->delete();
                return response("Deleted Successfully", 200);
            } else {
                return response('Link Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getFirStatus()
    {
        try {
            $fir_statuses = FirStatus::get();
            return response([
                "fir_statuses" => $fir_statuses,
                "message" => "All Fir Statuses"
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
