<?php

namespace Database\Factories;

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
        return [
            'user_id' => 1,
            'department_id' => rand(1,4),
            'division_id' => rand(1,2),
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
        ];
    }
}
