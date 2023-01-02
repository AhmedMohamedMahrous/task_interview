<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->sentence(2),
            "description" => $this->faker->sentence(7),
            "project_id" => Project::factory()->create(),
            "super_id" => User::factory()->create()
        ];
    }
}
