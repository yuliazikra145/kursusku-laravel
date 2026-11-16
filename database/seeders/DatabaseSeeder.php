<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Memanggil ParticipantSeeder yang baru kita buat
        $this->call([
            ParticipantSeeder::class,
        ]);

        // 2. (Opsional) Jika Anda tetap ingin membuat User dummy untuk login/testing
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}