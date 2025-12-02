<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@rentcam.com',
    'password' => bcrypt('password123'),
    'role' => 'admin' // Jika kamu pakai kolom role
]);

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
    
}
