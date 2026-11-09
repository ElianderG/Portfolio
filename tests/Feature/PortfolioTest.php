<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_lists_projects_in_order_and_shares_the_profile(): void
    {
        Project::factory()->create([
            'title' => 'Segundo',
            'sort_order' => 2,
        ]);

        Project::factory()->create([
            'title' => 'Primeiro',
            'slug' => 'primeiro',
            'sort_order' => 1,
        ]);

        Skill::factory()->create([
            'name' => 'Laravel',
            'category' => 'Backend',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Home')
                ->where('profile.name', 'Eliander')
                ->has('projects', 2)
                ->where('projects.0.title', 'Primeiro')
                ->where('projects.0.href', route('projects.show', 'primeiro'))
                ->where('projects.1.title', 'Segundo')
                ->missing('projects.0.sort_order')
                ->has('skills', 1)
                ->where('skills.0.name', 'Laravel')
                ->where('skills.0.category', 'Backend')
            );
    }

    public function test_project_page_shows_the_selected_project(): void
    {
        $project = Project::factory()->create([
            'title' => 'Glowing Star',
            'slug' => 'glowing-star',
        ]);

        $this->get(route('projects.show', $project))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('Projects/Show')
                ->where('project.title', 'Glowing Star')
                ->where('project.slug', 'glowing-star')
                ->missing('project.sort_order')
            );
    }

    public function test_unknown_project_returns_not_found(): void
    {
        $this->get('/projetos/nao-existe')->assertNotFound();
    }
}
