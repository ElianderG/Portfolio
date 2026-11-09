<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Projetos e capacidades exibidos na landing.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'PetComCarinho',
                'slug' => 'petcomcarinho',
                'summary' => 'Marketplace de animais em que ONGs publicam adoção sem custo e criadores ou lojas vendem pagando um percentual.',
                'description' => "ONGs publicam animais para adoção sem custo. Canis, criadouros e lojas anunciam animais ou artigos e pagam um percentual da venda.\n\nO produto está em Laravel 13, com a interface em Vue 3 e Inertia, autenticação por sessão e MySQL.",
                'url' => null,
                'repository_url' => null,
                'stack' => ['Laravel', 'Vue.js', 'Inertia', 'Tailwind CSS', 'MySQL'],
                'sort_order' => 1,
            ],
            [
                'title' => 'Glowing Star',
                'slug' => 'glowing-star',
                'summary' => 'Jogo de texto no navegador em que você modera um canal de streaming e equilibra engajamento, saúde e reputação.',
                'description' => "A partida coloca você como moderador: cuida do chat, apoia a streamer e tenta fazer o canal crescer sem descuidar da saúde e da reputação.\n\nA base está em Laravel 13. A interface usa Blade, Alpine.js e uma shell de desktop com janelas e barra de tarefas.",
                'url' => null,
                'repository_url' => null,
                'stack' => ['Laravel', 'Blade', 'Alpine.js', 'Tailwind CSS', 'MySQL'],
                'sort_order' => 2,
            ],
        ];

        foreach ($projects as $project) {
            Project::query()->updateOrCreate(
                ['slug' => $project['slug']],
                $project,
            );
        }

        $skills = [
            ['name' => 'PHP', 'category' => 'Backend', 'sort_order' => 1],
            ['name' => 'Laravel', 'category' => 'Backend', 'sort_order' => 2],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'sort_order' => 3],
            ['name' => 'Inertia', 'category' => 'Frontend', 'sort_order' => 4],
            ['name' => 'Blade', 'category' => 'Frontend', 'sort_order' => 5],
            ['name' => 'Alpine.js', 'category' => 'Frontend', 'sort_order' => 6],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'sort_order' => 7],
            ['name' => 'MySQL', 'category' => 'Dados', 'sort_order' => 8],
            ['name' => 'SQLite', 'category' => 'Dados', 'sort_order' => 9],
        ];

        foreach ($skills as $skill) {
            Skill::query()->updateOrCreate(
                ['name' => $skill['name']],
                $skill,
            );
        }
    }
}
