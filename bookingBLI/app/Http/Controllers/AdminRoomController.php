<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index(Request $request){
        $query = Room::query();

    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where('name', 'LIKE', "%$search%")
              ->orWhere('floor', 'LIKE', "%$search%")
              ->orWhereHas('roomType', function ($q) use ($search) {
                  $q->where('name', 'LIKE', "%$search%");
              });
    }

    $rooms = $query->paginate(4);
        return view('admin/room')->with('rooms', $rooms);
    }

    public function change(Request $request){
        $request -> validate([
            'room_id' => 'required|exists:rooms,id',
        ]);

        $room = Room::find($request->room_id);
        $room->status = !$room->status;
        $room->save();

        return redirect()->back()->with('success', 'Room status changed!');
    }
}
