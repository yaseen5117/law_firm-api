<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        // Find the user by email
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            request()->session()->flash('token', "We can't find a user with that email address.");
            return back();        
        }
        $token = DB::table('password_resets')->where('email', $request->email)->first();
    
        // Check if the token exists and is not expired
        if ($token && $token->created_at && Carbon::parse($token->created_at)->addMinutes(60)->isPast()) {         
            request()->session()->flash('token', 'This password reset token is invalid.');
                return back(); 
        }   
    
        $user->password = $request->password;    
        $user->save();
         
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
}