<?php

namespace App\Http\Controllers\Api;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use App\Models\PetitionIndex;
use Illuminate\Http\Request;
=======
use App\Models\PetitionIndex;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
>>>>>>> 6f6babf0d0f7f0c2e7569a64135c36316e92056c

class PetitionIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        //
=======
        try {
            return $petition_index= PetitionIndex::orderby('created_at','desc')->get();
            return response($petition_index,200);
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
>>>>>>> 6f6babf0d0f7f0c2e7569a64135c36316e92056c
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
<<<<<<< HEAD
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
=======
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function show(PetitionIndex $petitionIndex)
    {
        //
>>>>>>> 6f6babf0d0f7f0c2e7569a64135c36316e92056c
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< HEAD
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
=======
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function edit(PetitionIndex $petitionIndex)
>>>>>>> 6f6babf0d0f7f0c2e7569a64135c36316e92056c
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
=======
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PetitionIndex $petitionIndex)
>>>>>>> 6f6babf0d0f7f0c2e7569a64135c36316e92056c
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
=======
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function destroy(PetitionIndex $petitionIndex)
>>>>>>> 6f6babf0d0f7f0c2e7569a64135c36316e92056c
    {
        //
    }
}
