<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {

        return view('favorite.index');
    }
    public function store(Room $room)
    {
        auth()->user()->favorites()->syncWithoutDetaching([$room->id]);
    
        return request()->wantsJson()
            ? response()->json(['success' => true])
            : back()->with('success', 'Room added to favorites');
    }

    public function destroy(Room $room)
    {
        auth()->user()->favorites()->detach($room->id);
    
        return request()->wantsJson()
            ? response()->json(['success' => true])
            : back()->with('success', 'Room removed from favorites');
    }
}
