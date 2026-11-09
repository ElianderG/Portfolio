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
            [
                'title' => 'Tropa do Metal',
                'slug' => 'tropa-do-metal',
                'summary' => 'Site de cadastro para um evento musical fictício, feito no seminário da faculdade.',
                'description' => "O trabalho cobre o cadastro de participantes, login da administração, alteração e exclusão de registros, e a listagem de quem se inscreveu.\n\nFoi construído com PHP, HTML, CSS, JavaScript e MySQL.",
                'url' => null,
                'repository_url' => 'https://github.com/ElianderG/Projeto-Semin-rio-Tropa-do-Metal',
                'stack' => ['PHP', 'JavaScript', 'MySQL'],
                'sort_order' => 3,
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
            ['name' => 'Node.js', 'category' => 'Backend', 'sort_order' => 3],
            ['name' => 'JavaScript', 'category' => 'Backend', 'sort_order' => 4],
            ['name' => 'Python', 'category' => 'Backend', 'sort_order' => 5],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'sort_order' => 6],
            ['name' => 'Inertia', 'category' => 'Frontend', 'sort_order' => 7],
            ['name' => 'React', 'category' => 'Frontend', 'sort_order' => 8],
            ['name' => 'Next.js', 'category' => 'Frontend', 'sort_order' => 9],
            ['name' => 'React Native', 'category' => 'Frontend', 'sort_order' => 10],
            ['name' => 'Flutter', 'category' => 'Frontend', 'sort_order' => 11],
            ['name' => 'TypeScript', 'category' => 'Frontend', 'sort_order' => 12],
            ['name' => 'Alpine.js', 'category' => 'Frontend', 'sort_order' => 13],
            ['name' => 'Livewire', 'category' => 'Frontend', 'sort_order' => 14],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'sort_order' => 15],
            ['name' => 'WordPress', 'category' => 'Frontend', 'sort_order' => 16],
            ['name' => 'MySQL', 'category' => 'Dados', 'sort_order' => 17],
            ['name' => 'PostgreSQL', 'category' => 'Dados', 'sort_order' => 18],
            ['name' => 'Redis', 'category' => 'Dados', 'sort_order' => 19],
            ['name' => 'Prisma', 'category' => 'Dados', 'sort_order' => 20],
            ['name' => 'Docker', 'category' => 'Infra', 'sort_order' => 21],
            ['name' => 'Linux', 'category' => 'Infra', 'sort_order' => 22],
        ];

        Skill::query()
            ->whereNotIn('name', array_column($skills, 'name'))
            ->delete();

        foreach ($skills as $skill) {
            Skill::query()->updateOrCreate(
                ['name' => $skill['name']],
                $skill,
            );
        }
    }
}
