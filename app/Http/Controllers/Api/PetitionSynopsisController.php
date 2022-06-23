<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PetitionModuleType;
use App\Models\PetitionSynopsis;
use Illuminate\Http\Request;

class PetitionSynopsisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:admin')->only(['store', 'destroy']);
    }
    public function index(Request $request)
    {
        try {
            $petitionSynopsis = PetitionSynopsis::with('petition', 'attachments')->where('petition_id', $request->petition_id)->get();

            return response()->json(
                [
                    'records' => $petitionSynopsis,
                    'message' => 'Successs',
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
            if ($request->synopsis_date) {
                $request->merge([
                    'synopsis_date' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->synopsis_date)->format('Y/m/d'),
                ]);
            }
            if (!$request->synopsis_type_id) {
                $request->merge([
                    'synopsis_type_id' => 1,
                ]);
            }
            $petitionSynopsis = PetitionSynopsis::updateOrCreate(['id' => $request->id], $request->except('editMode', 'petition', 'attachments'));

            return response()->json(
                [
                    'petitionSynopsis' => $petitionSynopsis,
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

            $petitionSynopsis = PetitionSynopsis::with('petition', 'attachments')->whereId($id)->first();


            return response()->json(
                [
                    'record' => $petitionSynopsis,
                    'message' => 'Successs',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function showSynopsisByPetition(Request $request)
    {
        try {

            $this->validate($request, [
                'petition_id' => 'required'
            ]);

            $query = PetitionSynopsis::with('petition', 'attachments')->wherePetitionId($request->petition_id);

            if ($request->id > 0) {
                $query->whereId($request->id);
            }
            $petitionSynopsis = $query->first();

            return response()->json(
                [
                    'record' => $petitionSynopsis,
                    'message' => 'show Synopsis By Petition Successs',
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
            $petitionSynopsis = PetitionSynopsis::find($id);
            if ($petitionSynopsis) {
                $petitionSynopsis->delete();
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
    public function getSynopsisTypes(Request $request)
    {
        try {
            $query = PetitionModuleType::query();
            if (!empty($request->module_id)) {
                $query->where('module_id', $request->module_id);
            }
            $synopsisTypes = $query->orderby('display_order', 'desc')->get();
            return response()->json(
                [
                    'synopsisTypes' => $synopsisTypes,
                    'message' => 'Successs',
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
