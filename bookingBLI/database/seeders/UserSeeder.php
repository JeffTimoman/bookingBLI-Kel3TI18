<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'Gabriel Gavin Geraldo', 'role' => 'Admin', 'username' => '0001', 'password' => 'admin123', 'user_type_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        User::create(['name' => 'Nicolaus Bintang Nathanael', 'role' => 'Admin', 'username' => '0002', 'password' => 'admin123', 'user_type_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        User::create(['name' => 'Cecilia Supardi', 'role' => 'Admin', 'username' => '0003', 'password' => 'admin123', 'user_type_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
        User::create(['name' => 'Victoria Simanjaya', 'role' => 'User', 'username' => '0004', 'password' => 'password123', 'user_type_id' => 2, 'created_at' => now(), 'updated_at' => now()]);
        User::create(['name' => 'Ni Made Meisya Artharini', 'role' => 'User', 'username' => '0005', 'password' => 'password123', 'user_type_id' => 2, 'created_at' => now(), 'updated_at' => now()]);
    }
}
