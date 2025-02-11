<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Not;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RoomTypeSeeder::class,
            UserTypeSeeder::class,
            RoomSeeder::class,
            UserSeeder::class,
            TimeSeeder::class,
            // BookSeeder::class,
            // FavoriteSeeder::class,
            // NotificationSeeder::class,
        ]);
    }
}
