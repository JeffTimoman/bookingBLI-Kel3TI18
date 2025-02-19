<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Room;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'room_id'   => 'required|exists:rooms,id',
            'people'    => 'required|integer|min:1',
            'purpose'   => 'required|string|max:255',
            'selected_times_id' => 'required|string',
        ]);

        
        $selectedTimes = json_decode($request->input('selected_times_id'), true);

        $selectedTimes = array_unique($selectedTimes);

        $room_name = Room::find($request->room_id)->name;

        // Create a new booking

        foreach ($selectedTimes as $time) {
            Time::where('id', $time)->update(['status' => 0]);
            Books::create([
                'user_id'   => Auth::id(),
                'room_id'   => $request->room_id,
                'time_id'   => $time,
                'date'      => now()->toDateString(),
                'people'    => $request->people,
                'purpose'   => $request->purpose,
                'status'    => 0,  // Default status (e.g., pending approval)
            ]);


        }

        return redirect()->back()->with('success', 'Booking successful!');
    }
}
