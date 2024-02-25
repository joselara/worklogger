<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReportFactory extends Factory
{
    protected $model = Report::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => 'Report - ' . $this->faker->monthName(),
            'invoice_date' => $this->faker->date(),
            'invoice_number' => 'INV-' . Str::random(8),
            'total_amount' => $this->faker->randomFloat(2, 50, 5000),
            'is_paid' => $this->faker->boolean(20)
        ];
    }
}
