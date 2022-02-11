<?php

namespace App\Http\Controllers\Api;

use App\Models\PetitionIndex;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetitionIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return $petition_index= PetitionIndex::orderby('created_at','desc')->get();
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
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function show(PetitionIndex $petitionIndex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function edit(PetitionIndex $petitionIndex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PetitionIndex $petitionIndex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function destroy(PetitionIndex $petitionIndex)
    {
        //
    }
}
