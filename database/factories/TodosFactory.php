<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status_list = [
            "In Progress",
            "Completed"
        ];
        return [
            'title' => fake()->name(),
            'body' => fake()->text(),
            'status' => fake()->randomElement($status_list),
            'priority' => fake()->numberBetween(1, 3),
            'user_id' => fake()->numberBetween(1, 5)

        ];
    }
}
