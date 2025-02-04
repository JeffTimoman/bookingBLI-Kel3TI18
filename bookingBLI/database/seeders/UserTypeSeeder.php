<?php

namespace Database\Seeders;

use App\Models\UserType;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::create(['name' => 'PPTI', 'created_at' => now(), 'updated_at' => now()]);
        UserType::create(['name' => 'PPBP', 'created_at' => now(), 'updated_at' => now()]);
        UserType::create(['name' => 'Trainee', 'created_at' => now(), 'updated_at' => now()]);
        UserType::create(['name' => 'DPP', 'created_at' => now(), 'updated_at' => now()]);
        UserType::create(['name' => 'Visitor', 'created_at' => now(), 'updated_at' => now()]);
    }
}
