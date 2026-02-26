<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewRegister()
    {
        return view('register');
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required|max:10',
            'email' => 'required|email',
            'password' => 'required|confirmed|max:20'
        ]);

        $user = User::create($request->only(['name', 'email', 'password']));

        Auth::login($user);

        return redirect()->intended('/home');
    }   

    public function logout(){
        Auth::logout();
        return back();
    }


    public function viewLogin(){
        return view('login');
    }


     public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:20'
        ]);

        // $user = User::where('email', $request->email)->first();
        // Auth::login($user);

        if ( Auth::attempt($request->only(['email', 'password']))){
            return redirect()->intended('/home');
        }
       
        return back()->withErrors(['message' => 'Invalid user']);
        
    }  


}
