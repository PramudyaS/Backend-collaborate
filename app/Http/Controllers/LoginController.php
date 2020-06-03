<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	$user = User::where('email',$request->credentials['email'])->first();
    	if (!$user || !Hash::check($request->credentials['password'], $user->password)) {
    		return response()->json(['message'=>'These credentials do not match our records'],404);
    	}

    	Auth::attempt(['email'=>$request->credentials['email'],'password'=>$request->credentials['password']]);

    	$token = $user->createToken('collaborate-app')->plainTextToken;

    	return response()->json(['user'=>Auth::user(),'token'=>$token],201);
    }


    public function logout()
    {
        
    }
}
