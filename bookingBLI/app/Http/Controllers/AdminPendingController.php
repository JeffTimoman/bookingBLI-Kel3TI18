<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Room;
use App\Models\Time;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;

class AdminPendingController extends Controller
{
    public function index(){
        $data = Books::orderBy('created_at','desc')->get();
        $dataMerge = [];

        foreach ($data as $d) {
            $isExist = false;

            foreach ($dataMerge as $key => $dm) {
                if (
                    $dm['user_id'] == $d->user_id && 
                    $dm['room_id'] == $d->room_id && 
                    $dm['date'] == $d->date && 
                    $dm['people'] == $d->people && 
                    $dm['purpose'] == $d->purpose && 
                    $dm['status'] == $d->status
                ) {
                    $isExist = true;
                    $dataMerge[$key]['time_id'][] = Time::find($d->time_id)->start. ' - '.Time::find($d->time_id)->end;
                    $dataMerge[$key]['book_id'][] = $d->id; 
                    break;
                }
            }

            if (!$isExist) {
                $dataMerge[] = [
                    'book_id' => [$d->id],
                    'user_id' => $d->user_id,
                    'user_name' => User::find($d->user_id)->name,
                    'user_type' => User::find($d->user_id)->userType->name,
                    'room_id' => $d->room_id,
                    'room_name' => Room::find($d->room_id)->name,
                    'date' => $d->date,
                    'people' => $d->people,
                    'purpose' => $d->purpose,
                    'status' => $d->status,
                    'time_id' => [Time::find($d->time_id)->start. ' - '.Time::find($d->time_id)->end],
                    'created_at' => $d->created_at,
                ];
            }
        }
        // dd($dataMerge);
        
        return view('admin/pending')->with([
            'data' => $dataMerge
        ]);
    }

    public function change(Request $request) {
        $bookIds = $request->input('book_id'); // Get the array of book IDs
        $status = $request->input('status');  // Get the requested status (1 or -1)
        $userId = $request->input('user_id');
        $date = \Carbon\Carbon::parse($request->input('date'));
        $name = $request->input('name');
    
        // Validate request
        if (!in_array($status, [1, -1])) {
            return back()->with('error', 'Invalid status value.');
        }
    
        if (!is_array($bookIds) || empty($bookIds)) {
            return back()->with('error', 'No booking selected.');
        }
    
        // Update all selected bookings
        Books::whereIn('id', $bookIds)->update(['status' => $status]);

        if ($status == 1) {
            Notification::create(attributes: [
                'user_id' => $userId,
                'message' => "Booking for {$name} on {$date->format('l, F j, Y')}",
                'type' => Notification::TYPE_APPROVED,
                'read' => false
            ]);
        } else if ($status == -1) {
            $times = Books::whereIn('id', $bookIds)->pluck('time_id')->toArray();
            Time::whereIn('id', $times)->update(['status' => 1]); // Assuming Time model has 'status' column
            
            Notification::create([
                'user_id' => $userId,
                'message' => "Booking for {$name} on {$date->format('l, F j, Y')}",
                'type' => Notification::TYPE_REJECTED,
                'read' => false
            ]);
        }
        return back()->with('success', 'Booking status updated successfully.');
    }
}

