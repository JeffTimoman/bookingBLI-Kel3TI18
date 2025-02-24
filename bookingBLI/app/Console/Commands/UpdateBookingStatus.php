<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Books;

class UpdateBookingStatus extends Command
{
    protected $signature = 'booking:update-status';
    protected $description = 'Update booking status based on the date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $data = Books::orderBy('created_at', 'desc')->get();
        $dataMerge = [];

        foreach ($data as $d) {
            $isExist = false;

            foreach ($dataMerge as $key => $dm) {
                if (
                    $dm['user_id'] == $d->user_id &&
                    $dm['room_id'] == $d->room_id &&
                    $dm['date'] == $d->date &&
                    $dm['people'] == $d->people &&
                    $dm['purpose'] == $d->purpose && $dm['status'] == $d->status
                ) {
                    $isExist = true;
                    $dataMerge[$key]['time_id'][] = $d->time_id;
                    $dataMerge[$key]['book_id'][] = $d->id;
                    break;
                }
            }

            if (!$isExist) {
                $dataMerge[] = [
                    'book_id' => [$d->id],
                    'user_id' => $d->user_id,
                    'room_id' => $d->room_id,
                    'date' => $d->date,
                    'people' => $d->people,
                    'purpose' => $d->purpose,
                    'status' => $d->status,
                    'time_id' => [$d->time_id],
                    'created_at' => $d->created_at,
                ];
            }
        }

        foreach ($dataMerge as $key => $item) {
            if ($item['date'] < now()->toDateString() && $item['status'] != 1) {
                $dataMerge[$key]['status'] = -1; // Update in array
                Books::whereIn('id', $item['book_id'])->update(['status' => -1]); // Update in database
            }
        }

        $this->info('Booking statuses have been updated.');
    }
}