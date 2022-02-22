<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Petition;
use App\Models\User;
use App\Models\PetitionPetitioner;
use App\Models\PetitionIndex;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $petitions = Petition::withRelations()->get();
            return response()->json(
                [
                    'petitions' => $petitions,
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

            
            
            $petition = Petition::updateOrCreate(['id'=>$request->id],$request->except('new_petitioner','petitioner','opponent','petitioner_names','petitioners','court'));
            if (is_array($request->petitioner) && count($request->petitioner)>0) {
                foreach ($request->petitioner as $petitioner) {
                    $userData = $petitioner; 
                    $userData['password'] = bcrypt('test1234');
                    $userData['email'] = time()."@mailinator.com";
                    $user = User::create($userData);
                    $user->assignRole('client');

                    PetitionPetitioner::create([
                        'petition_id'=>$petition->id,
                        'petitioner_id'=>$user->id,
                    ]);
                    
                }
            }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        try {

            $petition = Petition::withRelations()->where('id',$id)->first();
            $petition_details = PetitionIndex::where('petition_id',$id)->get();
            return response()->json(
                [
                    'petition' => $petition,
                    'petition_details' => $petition_details,
                    'message' => 'petition_details',
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
        //
    }
}
