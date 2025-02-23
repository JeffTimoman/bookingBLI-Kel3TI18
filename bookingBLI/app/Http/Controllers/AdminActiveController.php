<?php

namespace App\Http\Controllers;


use App\Models\Books;
use App\Models\Room;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;

class AdminActiveController extends Controller
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
        
        return view('admin/active')->with([
            'data' => $dataMerge
        ]);
    }
}
