<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user =  User::create($request->all());
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
         
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();
        if(!$user)
        {
            return response([
                'message' => 'Email or Password is Not Correct'
            ], 401);
        }
        // Check password
        if(!Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Wrong Password'
            ], 401);
        }
        // Check User Approval
        if($user->is_approved != 1) {
            return response([
                'message' => 'Your account is currently not approved. Please wait for admin approval.'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

   
}
