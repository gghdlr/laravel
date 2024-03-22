<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    function signin(){
        return view('auth.signin');
    }

    function registr(Request $requset){
        $requset->validate([
            'name'=>'required',
            'email'=>'required|unique:App\Models\User|email',
            'password'=>'required|min:6'
        ]);
        $response = [
            'name'=>$requset->name,
            'email'=>$requset->email,
            'password'=>$requset->password
        ];
        //return response()->json($response);
        $user = User::create([
            'name'=>$requset->name,
            'email'=>$requset->email,
            'password'=>Hash::make($requset->password)
        ]);
        $user->createToken('MyAppToken');
        return redirect()->route('login');
    }

    function login(){
        return view('auth.signup');
    }

    function signup(Request $requset){
        $credentials = $requset->validate([
            'email'=>'required',
            'password'=>'required|min:6'
        ]);
        
        if(Auth::attempt($credentials)) {
            $requset->session()->regenerate();
            return redirect()->intended('/article');
        }
        return back()->withErrors([
            'email' => "Error",
        ])->onlyInput('email');
    }

    function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
        

    }

}
