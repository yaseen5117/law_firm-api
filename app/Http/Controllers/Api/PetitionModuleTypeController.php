<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PetitionModuleType;
use Illuminate\Http\Request;

class PetitionModuleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $query = PetitionModuleType::query();
            if (!empty($request->module_id)) {
                $query->where('module_id', $request->module_id);
            }
            $moduleTypes = $query->orderby('display_order', 'asc')->get();
            return response()->json(
                [
                    'moduleTypes' => $moduleTypes,
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
            $orderSheetType = PetitionModuleType::updateOrCreate(['id' => $request->id], $request->except('editMode'));
            return response()->json(
                [
                    'orderSheetType' => $orderSheetType,
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
        try {
            $orderSheetType = PetitionModuleType::find($id);
            if ($orderSheetType) {
                $orderSheetType->delete();
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
}
