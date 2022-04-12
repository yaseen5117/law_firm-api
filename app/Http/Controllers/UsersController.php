<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\ModelHasRole;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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

    public function index(Request $request)
    {         
        $user = Auth::user();
        //dd($user->posts);
        $logged_user_profile = false;
        return view('users.profile', compact('user','logged_user_profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    public function store(Request $request)
    {
        try {

        } catch (\Exception $e) {
            
            $request->session()->flash('error', $e->getMessage());
            
            return redirect(route($this->route_name.".index"));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          
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
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
    }

    public function chagneUserProfileImage(Request $request)
    {
        $file = $request->file('file');              
        if ($file) {         
            $fileName = md5(microtime()) . '.' . $file->getClientOriginalExtension();                    
            User::where("id", $request->id)->update(["profile_image" => $fileName]);
            $file->storeAs('users/' . $request->id . '/', $fileName);
            return response([
                'redirect_url' => '/dashboard'
            ]);
        }        
    }   

    public function rateUser(Request $request)
    {
        return request();
        $user = Auth::user();
        Post::create([
            'rated_by_user_id' => $user->id,  
            'user_id' => $request->user_id                      
        ]);
        return $user->id;        
    }   
        
}
