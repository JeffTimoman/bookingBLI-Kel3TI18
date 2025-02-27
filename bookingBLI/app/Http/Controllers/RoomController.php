<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class RoomController extends Controller
{
    function index(){
        $data = Room::orderBy('name', 'asc')->paginate(100);
        // Time::query()->update(['status' => 1]);
        return view('room/index')->with('data', $data);
    
    }

    public function show(string $name)
    {
        $user = Auth::user();
        
        // Cek apakah room ada
        $data = Room::where('name', $name)->first();
        if (!$data) {
            abort(404, 'Room not found');
        }

        // Ambil semua time slots dari room yang dipilih
        $times = Time::where('room_id', $data->id)->get();

        return view('room.show')->with([
            'data' => $data,
            'user' => $user,
            'times' => $times // Ubah dari time → times
        ]);
    }
}
