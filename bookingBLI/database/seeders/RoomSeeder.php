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
        Room::factory()->create(['name' => 'A10001', 'img' => 'Ntar_Delete_1.jpg', 'room_type_id' => 1, 'status' => false, 'floor' => 'A10']);
        // Room::factory()->create(['name' => 'A10002', 'room_type_id' => 1, 'status' => true]);
        // Room::factory()->create(['name' => 'A900', 'room_type_id' => 1, 'status' => true]);
        // Room::factory()->create(['name' => 'A700', 'room_type_id' => 1, 'status' => true]);
        // Room::factory()->create(['name' => 'A6001', 'room_type_id' => 1, 'status' => true]);
        // Room::factory()->create(['name' => 'A6002', 'room_type_id' => 1, 'status' => true]);
        // Room::factory()->create(['name' => 'A500', 'room_type_id' => 1, 'status' => true]);
        // Room::factory()->create(['name' => 'A300', 'room_type_id' => 1, 'status' => true]);
        // Room::factory()->create(['name' => 'A200', 'room_type_id' => 1, 'status' => true]);

        Room::factory()->create(['name' => 'A201', 'img' => 'Ntar_Delete_2.jpg', 'room_type_id' => 2, 'status' => true, 'floor' => 'A2']);
        // Room::factory()->create(['name' => 'A202', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A203', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A204', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A205', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A206', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A301', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A302', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A303', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A304', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A305', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A306', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A307', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A501', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A501', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A502', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A503', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A601', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A602', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A701', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A702', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A703', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A704', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A705', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A706', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A707', 'room_type_id' => 2, 'status' => true]);
        // Room::factory()->create(['name' => 'A708', 'room_type_id' => 2, 'status' => true]);

        Room::factory()->create(['name' => 'A801', 'img' => 'Ntar_Delete_3.jpg', 'room_type_id' => 3, 'status' => true, 'floor' => 'A8']);
        // Room::factory()->create(['name' => 'A802', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A803', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A901', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A902', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A903', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A904', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A905', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A906', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A1001', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A1002', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A1003', 'room_type_id' => 3, 'status' => true]);
        // Room::factory()->create(['name' => 'A1004', 'room_type_id' => 3, 'status' => true]);

        Room::factory()->create(['name' => 'A800', 'img' => 'Ntar_Delete_4.jpg', 'room_type_id' => 4, 'status' => true, 'floor' => 'A8']);

        Room::factory()->create(['name' => 'A400', 'img' => 'Ntar_Delete_5.jpg', 'room_type_id' => 5, 'status' => true, 'floor' => 'A4']);
        
        Room::factory()->create(['name' => 'A401', 'img' => 'Ntar_Delete_6.jpg', 'room_type_id' => 6, 'status' => true, 'floor' => 'A4']);
            
    }
}
