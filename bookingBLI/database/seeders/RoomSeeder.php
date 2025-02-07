<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::factory()->create(['name' => 'Room A2006',]);
        Room::factory()->create(['name' => 'Room A3002',]);
        Room::factory()->create(['name' => 'Room A2007',]);
        Room::factory()->create(['name' => 'Room B8002', 'room_type_id' => 3]);
        Room::factory()->create(['name' => 'Room A5007',]);
    }
}
