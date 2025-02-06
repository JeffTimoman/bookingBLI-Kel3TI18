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
            'name' => 'admin',
            'role' => 'Admin',
            'username' => '0001',
            'password' => 'admin123',
            'user_type_id' => 1,
        ]);
    }
}
