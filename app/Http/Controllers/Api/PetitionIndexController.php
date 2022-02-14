<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\PetitionIndex;
use App\Models\Petition;
use Illuminate\Http\Request;


class PetitionIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //

        try {
            $petition_index= PetitionIndex::orderby('created_at','desc')->get();
            return response($petition_index,200);
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
        //
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
            $petition_indexes = PetitionIndex::where('petition_id', $id)->get();
            return response()->json(
                [
                    'petition_indexes' => $petition_indexes,
                    'message' => 'Petition Indexes',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }

    public function show($petitionIndex)
    {

        try {
            $petitionIndex = PetitionIndex::with('petition')->whereId($petitionIndex)->first();
            $petition = Petition::withRelations()->whereId($petitionIndex->petition_id)->first();

            return response()->json(
                [
                    'petition' => $petition,
                    'petition_index' => $petitionIndex,
                    'message' => 'Success',
                    'code' => 200
                ]
            );
            return response($petitionIndex,200);
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

     
    public function edit(PetitionIndex $petitionIndex)

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

    
    public function update(Request $request, PetitionIndex $petitionIndex)

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

    
    public function destroy(PetitionIndex $petitionIndex)

    {
        //
    }
}
