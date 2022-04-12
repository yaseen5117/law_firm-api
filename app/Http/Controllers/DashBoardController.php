<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
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
        //
    }
    public function favourite(Request $request){
        if(Auth::user()){
            $user = $request->user();
        $isFavourite = Favourite::where('item_id', $request->item_id)->where('user_id', $user->id)->first();
        if($isFavourite){
            $isFavourite->delete();
            return response([
                'token' => 1,
            ]);
        }else{
            $favourite = Favourite::create([
                'item_id' => $request->item_id,
                'user_id' => $user->id,
            ]);
            return response([
                'favourite' => $favourite,
                'message' => 'Successfully become item Favourite',
                'token' => 0,
                'status' => 200
            ]);
        } 
        }else{
            return response([
                "redirect_url" => url('login')
            ],200);
        }
               
    }
}
