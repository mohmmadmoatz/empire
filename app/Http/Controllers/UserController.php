<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (Auth::attempt($credentials)) {
                   
      
		
       $user = Auth::user();
       //$success['token'] =  $user->createToken('user')->accessToken;
       return response()->json(['token' => $user->createToken('user')->accessToken,'info'=>$user]);

          
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
        
    }

    public function info()
    {
        $user = Auth::user();
        return response()->json(['user'=>$user]);
    }
}
