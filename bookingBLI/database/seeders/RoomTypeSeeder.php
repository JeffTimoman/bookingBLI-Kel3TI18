<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoomType::create(['name' => 'Discussion Room', 'created_at' => now(), 'updated_at' => now()]);
        RoomType::create(['name' => 'Stadium Classroom', 'created_at' => now(), 'updated_at' => now()]);
        RoomType::create(['name' => 'Regular Classroom', 'created_at' => now(), 'updated_at' => now()]);
        RoomType::create(['name' => 'Computer Room', 'created_at' => now(), 'updated_at' => now()]);
        RoomType::create(['name' => 'Think Tank', 'created_at' => now(), 'updated_at' => now()]);
        RoomType::create(['name' => 'Innovation Room', 'created_at' => now(), 'updated_at' => now()]);
    }
}
