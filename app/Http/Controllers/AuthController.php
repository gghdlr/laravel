<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    
    function signin(){
        return view('auth.signin');
    }

    function registr(Request $requset){
        $requset->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6'
        ]);
        $response = [
            'name'=>$requset->name,
            'email'=>$requset->email,
            'password'=>$requset->password
        ];
        //return response()->json($response);
        User::create([
            'name'=>$requset->name,
            'email'=>$requset->email,
            'password'=>Hash::make($requset->password)
        ]);
        return redirect('/');
    }

}
