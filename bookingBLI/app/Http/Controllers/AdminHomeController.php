<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Room;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index() {
        // Fetch all books data with user, userType, room, and time relationships
        // $data = Books::with(['user.userType', 'room_id', 'time_id'])
        //     ->orderBy('user_id', 'asc')
        //     ->get();

        $data = Books::orderBy('created_at','desc')->get();
        $rooms = Room::orderBy('name', 'asc')->get();
        $dataMerge = [];

        foreach ($data as $d) {
            $isExist = false;

            foreach ($dataMerge as $key => $dm) {
                if (
                    $dm['user_id'] == $d->user_id && $dm['room_id'] == $d->room_id && $dm['date'] == $d->date && $dm['people'] == $d->people && $dm['purpose'] == $d->purpose && $dm['status'] == $d->status
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

        // dd($dataMerge);
        $dataMerge = array_slice($dataMerge, 0, 4);
        // $rooms = array_slice($rooms, 0, 1);
        return view('admin/home')->with([
            'data' => $dataMerge,
            'rooms' => $rooms
        ]);
    }
}
