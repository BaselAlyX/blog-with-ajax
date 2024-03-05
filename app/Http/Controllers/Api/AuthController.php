<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        //dd($request->all());
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required','string','max:30'],


        ]);
        $email=$request->email;
        $password=$request->password;
      if( Auth::attempt(['email' => $email , 'password' => $password])){
        $user=User::where('email' , $email )->first();
        $token=$user->createToken("Api_token".$user->id)->plainTextToken;
        //dd($token);
        return response()->json([
        'token'=>$token,
        'user'=>$user
        
        ]);
      }else{
        return response()->json(['message' => "Data not correct"]);
      }
    }
}
