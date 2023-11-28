<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tahun = Date('Y');
        $bulan = Date('m');

        $random = Carbon::now()->subDays(rand(0, 200));

        return [
            'user_id' => rand(2, 5),
            'department_id' => rand(1, 4),
            'division_id' => rand(1, 2),
            'status_id' => rand(1, 2),
            'name' => fake()->word(3),
            'budget' => 500000,
            'financial_target' => 50000,
            'financial_realization' => 50000,
            'physical_target' => 50000,
            'physical_realization' => 50000,
            'dones' => ['dones 1'],
            'problems' => ['problems 1'],
            'follow_up' => ['follow up 1'],
            'todos' => ['todos 1'],
            'created_at' => $random,
            'updated_at' => $random,
        ];
    }
}
