<?php

namespace App\Http\Controllers\Api;

use App\Models\PetitionIndex;
use App\Models\Petition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetitionIndexController extends Controller
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
    public function index()
    {
        try {
            $petition_index = PetitionIndex::orderby('created_at', 'desc')->get();
            return response($petition_index, 200);
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
            if ($request->date) {
                $request->merge([
                    'date' => toDBDate($request->date), //\Carbon\Carbon::createFromFormat('d/m/Y', $request->date)->format('Y/m/d'),
                ]);
            }
            PetitionIndex::updateOrCreate(['id' => $request->id], $request->except('editMode', 'petition', 'attachments'));

            return response()->json(
                [
                    'message' => 'Petitions',
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
     * @param  \App\Models\PetitionIndex  $petitionIndex
     * @return \Illuminate\Http\Response
     */
    public function show($petitionIndex)
    {
        try {
            $petitionIndex = PetitionIndex::with('petition', 'attachments')->whereId($petitionIndex)->first();

            $previous_index_id = PetitionIndex::with('petition', 'attachments')->where('id', '<', $petitionIndex->id)->max('id');

            $next_index_id = PetitionIndex::with('petition', 'attachments')->where('id', '>', $petitionIndex->id)->min('id');

            $petition = Petition::withRelations()->whereId($petitionIndex->petition_id)->first();

            return response()->json(
                [
                    'petition' => $petition,
                    'petition_index' => $petitionIndex,
                    'next_index_id' => $next_index_id,
                    'previous_index_id' => $previous_index_id,
                    'message' => 'Success',
                    'code' => 200,
                ]
            );
            return response($petitionIndex, 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /* Show the form for editing the specified resource.
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
    public function destroy($petitionIndexId)
    {
        try {
            $petition_index = PetitionIndex::find($petitionIndexId);

            if ($petition_index) {
                $petition_index->delete();
                return response($petition_index, 200);
            } else {
                return response('Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
