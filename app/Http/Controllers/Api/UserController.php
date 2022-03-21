<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {         
        try{
            $query = User::with('roles');
            if (!empty($request->name)) {
                $query->where('name','like','%'.$request->name.'%');
            }

            if (!empty($request->email)) {
                $query->where('email','like','%'.$request->email.'%');
            }
            $users = $query->orderBy("name")->get();

            //$users = User::orderBy("name")->with('roles')->get();
            return response()->json(
                [
                    'users' => $users,
                    'message' => 'All Users',
                    'code' => 200
                ]
            );
        }catch (\Exception $e) {
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
        //return response($request->all(), 422);    
        try{
            $file = $request->file('file');     
                  
            if($file){
                $name = time() . '_' . $file->getClientOriginalName();                
                $file_name = time() . '_' . $file->getClientOriginalName();
                $request->merge([                    
                    'profile_image' => $file_name
                ]);             
            }
            $request->merge([
                'password' => bcrypt($request->password),                 
            ]);   
             
            $user = User::updateOrCreate(['id'=>$request->id],$request->except('file','created_at_formated_date','roles','editMode','confirm_password'));             
            
            if($file){
                $file_path = $file->storeAs('users/' . $user->id, $name, 'public');
            }

            return response(
                [
                    'user' => $user, 
                    'status' => 200
                ]
        );
        }catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        } 
        // [
        //     'name' => $request->name,
        //     'email' => $request->email
        // ]       
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
        //return response(['message' => 'success update', 'status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        try {             
            $user = User::find($userId); 
                    
            if($user){
                $user->delete();
                return response($user,200);
            }else{
                return response('User Not Found',404);
            }
            
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }
    //getting petitioners and Opponent
    public function getClient(){
        try{
            $clients = User::role('client')->orderBy("name")->get();
            return response()->json(
                [
                    'clients' => $clients,
                    'message' => 'All Clients',
                    'code' => 200
                ]
            );
        }catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
