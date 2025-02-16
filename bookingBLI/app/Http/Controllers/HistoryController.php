<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Room;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    function index(){
        $user = Auth::user();
        $data = Books::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(100);

        //row with same room_id, date, people, purpose, and status will be merged into one group with various time_id
        $dataMerge = [];
        foreach($data as $d){
            $isExist = false;
            foreach($dataMerge as $key => $dm){
                if($dm['room_id'] == $d->room_id && $dm['date'] == $d->date && $dm['people'] == $d->people && $dm['purpose'] == $d->purpose && $dm['status'] == $d->status){
                    $isExist = true;
                    $dataMerge[$key]['time_id'][] = Time::find($d->time_id)->start. ' - '.Time::find($d->time_id)->end;
                    break;
                }
            }
            if(!$isExist){
                $dataMerge[] = [
                    'room_id' => $d->room_id,
                    'room_name' => Room::find($d->room_id)->name,
                    'date' => $d->date,
                    'people' => $d->people,
                    'purpose' => $d->purpose,
                    'status' => $d->status,
                    'time_id' => [Time::find($d->time_id)->start. ' - '.Time::find($d->time_id)->end], 

                ];
            }
        }

        // dd($dataMerge);
        return view('history/index')->with('data', $dataMerge);
    }
}
