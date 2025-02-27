<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    function index(){
        $data = Room::orderBy('name', 'asc')->paginate(100);
        $data->load('roomType');
        
        $topRooms = Room::withCount('books')
            ->orderByDesc('books_count')
            ->take(5)
            ->get();

        return view('landing', compact('data', 'topRooms'));
    }

    public function topRooms()
    {
        $topRooms = Room::withCount('books')
            ->orderByDesc('books_count')
            ->take(5)
            ->get();

        return view('user.landing', compact('topRooms'));
    }
}
