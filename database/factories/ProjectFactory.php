<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'slug' => fake()->unique()->slug(3),
            'category' => 'profissional',
            'summary' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'url' => null,
            'repository_url' => null,
            'stack' => ['Laravel'],
            'sort_order' => 0,
        ];
    }
}
