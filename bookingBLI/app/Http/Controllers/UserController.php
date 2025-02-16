<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('username', 'asc')->paginate(2);
        return view('user/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('username', $request->username);
        Session::flash('password', $request->password);
        Session::flash('user_type_id', $request->user_type_id);

        $request->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required'
        ],[
            'name.required'=>'name must be filled',
            'username.required'=>'username must be filled',
            'password.required'=>'password must be filled'
        ]);
        $data = [
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'user_type_id' => $request->input('user_type_id'), 
        ];
        User::create($data);
        return redirect('user')->with('success', 'Successfully Insert Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = user::where('username', $id)->first();
        return view('user/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = user::where('username', $id)->first();
        return view('user/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required'
        ],[
            'name.required'=>'name must be filled',
            'username.required'=>'username must be filled',
            'password.required'=>'password must be filled'
        ]);
        $data = [
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'user_type_id' => $request->input('user_type_id'), 
        ];
        user::where('username', $id)->update($data);
        return redirect('/user')->with('success', 'Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user::where('username', $id)->delete();
        return redirect('/user')->with('success', 'Delete Successful');
    }
    
}
