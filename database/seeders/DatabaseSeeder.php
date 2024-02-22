<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->has(
                Contact::factory()->count(10), 'contacts'
            )
            ->has(
                Task::factory()->count(5), 'tasks'
            )
            ->create([
                'name' => 'Jose Lara',
                'email' => 'jose@joselara.com',
                'password' => Hash::make('nopass123')
            ]);
    }
}
