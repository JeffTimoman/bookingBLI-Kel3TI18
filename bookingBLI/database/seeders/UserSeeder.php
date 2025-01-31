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
        User::create([
            'name' => 'Gavin',
            'role' => 'User',
            'username' => '1001',
            'password' => 'password123',
            'user_type_id' => 1,
        ]);
    }
}
