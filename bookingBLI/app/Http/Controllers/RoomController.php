<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    function index(){
        $data = Room::orderBy('name', 'asc')->paginate(100);
        return view('room/index')->with('data', $data);
    }

    function show(string $name){
        $user = Auth::user();
        $data = Room::where('name', $name)->first();
        return view('room/show')->with([
            'data' => $data,
            'user' => $user
        ]);
    }
}
