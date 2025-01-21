<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call 
        $this->call([
            BidangSeeder::class,
            AdminUserSeeder::class,
            PegawaiSeeder::class,
            // seeder lainnya
        ]);

        // Check if the test user already exists before creating it
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }
    }
}
