<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class TimeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Time::create(['room_id' => 1, 'start' => '08:00 AM', 'end' => '09:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 1, 'start' => '10:00 AM', 'end' => '11:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 1, 'start' => '01:00 PM', 'end' => '02:30 PM' , 'status' => 1]);
        Time::create(['room_id' => 1, 'start' => '03:00 PM', 'end' => '05:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 1, 'start' => '05:00 PM', 'end' => '06:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 1, 'start' => '06:00 PM', 'end' => '07:00 PM' , 'status' => 1]);
        
        Time::create(['room_id' => 2, 'start' => '08:00 AM', 'end' => '09:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 2, 'start' => '10:00 AM', 'end' => '11:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 2, 'start' => '01:00 PM', 'end' => '02:30 PM' , 'status' => 1]);
        Time::create(['room_id' => 2, 'start' => '03:00 PM', 'end' => '05:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 2, 'start' => '05:00 PM', 'end' => '06:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 2, 'start' => '06:00 PM', 'end' => '07:00 PM' , 'status' => 1]);

        Time::create(['room_id' => 3, 'start' => '08:00 AM', 'end' => '09:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 3, 'start' => '10:00 AM', 'end' => '11:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 3, 'start' => '01:00 PM', 'end' => '02:30 PM' , 'status' => 1]);
        Time::create(['room_id' => 3, 'start' => '03:00 PM', 'end' => '05:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 3, 'start' => '05:00 PM', 'end' => '06:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 3, 'start' => '06:00 PM', 'end' => '07:00 PM' , 'status' => 1]);

        Time::create(['room_id' => 4, 'start' => '08:00 AM', 'end' => '09:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 4, 'start' => '10:00 AM', 'end' => '11:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 4, 'start' => '01:00 PM', 'end' => '02:30 PM' , 'status' => 1]);
        Time::create(['room_id' => 4, 'start' => '03:00 PM', 'end' => '05:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 4, 'start' => '05:00 PM', 'end' => '06:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 4, 'start' => '06:00 PM', 'end' => '07:00 PM' , 'status' => 1]);

        Time::create(['room_id' => 5, 'start' => '08:00 AM', 'end' => '09:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 5, 'start' => '10:00 AM', 'end' => '11:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 5, 'start' => '01:00 PM', 'end' => '02:30 PM' , 'status' => 1]);
        Time::create(['room_id' => 5, 'start' => '03:00 PM', 'end' => '05:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 5, 'start' => '05:00 PM', 'end' => '06:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 5, 'start' => '06:00 PM', 'end' => '07:00 PM' , 'status' => 1]);

        Time::create(['room_id' => 6, 'start' => '08:00 AM', 'end' => '09:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 6, 'start' => '10:00 AM', 'end' => '11:30 AM' , 'status' => 1]);
        Time::create(['room_id' => 6, 'start' => '01:00 PM', 'end' => '02:30 PM' , 'status' => 1]);
        Time::create(['room_id' => 6, 'start' => '03:00 PM', 'end' => '05:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 6, 'start' => '05:00 PM', 'end' => '06:00 PM' , 'status' => 1]);
        Time::create(['room_id' => 6, 'start' => '06:00 PM', 'end' => '07:00 PM' , 'status' => 1]);

        //
    }
}
