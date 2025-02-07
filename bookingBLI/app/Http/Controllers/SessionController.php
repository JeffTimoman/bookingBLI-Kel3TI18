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
        ], [
            'username.required' => 'Username is required',
            'password.required' => 'Password is required'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            // $user = Auth::user();
            // Check user's role and redirect accordingly
            if(auth()->user()->isAdmin()){
                return redirect('admin/home')->with('success', 'Login success');
            } else if (auth()->user()->isUser()) {
                return redirect('home')->with('success', 'Login success');
            }
        } else {
            return redirect('session')->with('error', 'Username or Password is wrong');
        }
    }
}
