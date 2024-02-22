<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'completed' => $this->faker->boolean,
            'completed_at' => $this->faker->optional($weight = 0.7)->dateTimeBetween('-1 year', 'now'),
            'due_date' => $this->faker->optional($weight = 0.5)->dateTimeBetween('now', '+1 month'),
            'hours_logged' => $this->faker->optional($weight = 0.8)->randomFloat(2, 0, 100),
            'notes' => $this->faker->optional($weight = 0.4)->paragraph,
        ];
    }
}
