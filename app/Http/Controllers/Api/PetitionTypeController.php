<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Court;
use App\Models\PetitionType;
use App\Models\PetitionTypeCourt;
use Illuminate\Http\Request;

class PetitionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $petition_types = PetitionType::with('petition_type_courts', 'petition_type_courts.court')->orderBy("title")->get();
            return response()->json(
                [
                    'petition_types' => $petition_types,
                    'message' => 'Petition Types',
                    'page_title' => 'Petition Types',
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

            $petition_type = PetitionType::updateOrCreate(['id' => $request->id], $request->only('title'));

            //Saving courts and petition to PetitionTypeCourt Table
            if (is_array($request->court_ids) && count($request->court_ids) > 0) {
                PetitionTypeCourt::where('petition_type_id', $petition_type->id)->delete();
                foreach ($request->court_ids as $court_id) {
                    PetitionTypeCourt::create([
                        'petition_type_id' => $petition_type->id,
                        'court_id' => $court_id,
                    ]);
                }
            }
            return response()->json(
                [
                    'message' => 'Petition Type Saved Successfully',
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

            $petition_type = PetitionType::with('petition_type_courts', 'petition_type_courts.court')->where('id', $id)->first();
            $petition_type->court_ids_array = $petition_type->petition_type_courts()->pluck('court_id');

            return response()->json(
                [
                    'petition_type' => $petition_type,
                    'message' => 'petition_type_details',
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
            $record = PetitionType::find($id);

            if ($record) {
                $record->delete();
                return response($record, 200);
            } else {
                return response('Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getCourtsName()
    {
        try {
            $courts = Court::orderBy("title")->get();
            $courtsData = [];
            foreach ($courts as $court) {
                $courtsData[] = [
                    'label' => $court->title,
                    'value' =>  $court->id,
                ];
            }
            return response()->json(
                [
                    'courts' => $courtsData,
                    'message' => 'All Courts',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
