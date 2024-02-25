<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\Report;
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

        $user = User::factory()
            ->has(Contact::factory()->count(3), 'contacts')
            ->create([
                'name' => 'Jose Lara',
                'email' => 'jose@joselara.com',
                'password' => Hash::make('nopass123')
            ]);

        Report::factory()->count(5)
            ->for($user)
            ->create()
            ->each(fn($report) =>
                Task::factory()->count(rand(2, 5))
                    ->for($user)
                    ->create()
                    ->each(fn($task) =>
                        $report->tasks()->attach($task, [
                            'hourly_rate' => fake()->randomFloat(2, 15, 60),
                            'hours_worked' => rand(1, 8),
                            'notes' => fake()->sentence()
                        ])
                    )
            );

    }
}
