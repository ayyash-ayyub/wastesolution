<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed admin user 'sakti' with password 'Sakti@2025'
        User::updateOrCreate(
            ['email' => 'sakti@example.com'],
            [
                'name' => 'sakti',
                'password' => 'Sakti@2025',
            ]
        );
    }
}
