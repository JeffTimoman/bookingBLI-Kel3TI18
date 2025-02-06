<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        return view('session/index');
    }

    function login(Request $request){
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username is required',
            'password.required' => 'Password is required'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            // kalau otentikasi sukses
            return redirect('home')->with('success', 'Login success');
        }else{
            // kalau otentikasi gagal
            return redirect('session')->with('error', 'Username or Password is wrong');
        }
    }
}
