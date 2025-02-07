<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    function index(){
        $data = Room::orderBy('name', 'asc')->paginate(5);
        return view('room/index')->with('data', $data);
    }

    function show(request $id){

    }
}
