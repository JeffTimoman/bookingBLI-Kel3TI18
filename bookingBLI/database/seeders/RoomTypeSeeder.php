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
        RoomType::create(['name' => 'Discussion', 'created_at' => now(), 'updated_at' => now()]);
        RoomType::create(['name' => 'Workout', 'created_at' => now(), 'updated_at' => now()]);
        RoomType::create(['name' => 'Think Tank', 'created_at' => now(), 'updated_at' => now()]);
    }
}
