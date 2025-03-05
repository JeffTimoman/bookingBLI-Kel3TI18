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
                    $dataMerge[$key]['book_id'][] = $d->id; 
                    break;
                }
            }
            if(!$isExist){
                $dataMerge[] = [
                    'book_id' => [$d->id],
                    'room_id' => $d->room_id,
                    'room_name' => Room::find($d->room_id)->name,
                    'room_img' => Room::find($d->room_id)->img,
                    'date' => $d->date,
                    'people' => $d->people,
                    'purpose' => $d->purpose,
                    'status' => $d->status,
                    'time_id' => [Time::find($d->time_id)->start. ' - '.Time::find($d->time_id)->end], 

                ];
            }
        }

        foreach ($dataMerge as $key => $item) {
            if ($item['date'] < now()->toDateString() && $item['status'] != 1) {
                $dataMerge[$key]['status'] = -1; // Update in array
                Books::whereIn('id', $item['book_id'])->update(['status' => -1]); // Update in database
            }
        }

        // dd($dataMerge);
        return view('history/index')->with('data', $dataMerge);
    }

    public function destroy(Request $request) {
        $bookIds = $request->input('book_id'); // Get the array of book IDs
        $timeIds = Books::whereIn('id', $bookIds)->pluck('time_id')->toArray(); // Get the array of time IDs
        Books::whereIn('id', $bookIds)->delete(); // Delete the books
        // update status in times table where the book_id is in $bookIds
        Time::whereIn('id', $timeIds)->update(['status' => 1]);
       

        return redirect()->route('history.index')->with('success', 'Booking history deleted');
    }
}
