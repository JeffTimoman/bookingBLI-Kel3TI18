<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Room $room)
    {
        auth()->user()->favorites()->syncWithoutDetaching([$room->id]);
        return back()->with('success', 'Room added to favorites');
    }

    public function destroy(Room $room)
    {
        auth()->user()->favorites()->detach($room->id);
        return back()->with('success', 'Room removed from favorites');
    }
}
