<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Jose Lara',
            'email' => 'jose@joselara.com',
            'password' => \Hash::make('nopass123')
        ]);

        \App\Models\Contact::factory(10)->create();
    }
}
