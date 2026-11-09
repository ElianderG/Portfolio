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
                'category' => 'profissional',
                'summary' => 'Marketplace de animais em que ONGs publicam adoção sem custo e criadores ou lojas vendem pagando um percentual.',
                'description' => "ONGs publicam animais para adoção sem custo. Canis, criadouros e lojas anunciam animais ou artigos e pagam um percentual da venda.\n\nO produto está em Laravel 13, com a interface em Vue 3 e Inertia, autenticação por sessão e MySQL.",
                'url' => 'https://petcomcarinho.paralells.com.br/',
                'repository_url' => 'https://github.com/ElianderG/CutnessCare',
                'image' => '/projects/petcomcarinho.jpg',
                'images' => null,
                'stack' => ['Laravel', 'Vue.js', 'Inertia', 'Tailwind CSS', 'MySQL'],
                'sort_order' => 1,
            ],
            [
                'title' => 'Glowing Star',
                'slug' => 'glowing-star',
                'category' => 'entretenimento',
                'summary' => 'Jogo de texto no navegador em que você modera um canal de streaming e equilibra engajamento, saúde e reputação.',
                'description' => "A partida coloca você como moderador: cuida do chat, apoia a streamer e tenta fazer o canal crescer sem descuidar da saúde e da reputação.\n\nA base está em Laravel 13. A interface usa Blade, Alpine.js e uma shell de desktop com janelas e barra de tarefas.",
                'url' => null,
                'repository_url' => null,
                'image' => '/projects/glowing-star-inicial.jpg',
                'images' => [
                    ['src' => '/projects/glowing-star-inicial.jpg', 'alt' => 'Tela inicial do Glowing Star'],
                    ['src' => '/projects/glowing-star-jogo.jpg', 'alt' => 'Tela de jogo do Glowing Star'],
                ],
                'stack' => ['Laravel', 'Blade', 'Alpine.js', 'Tailwind CSS', 'MySQL'],
                'sort_order' => 2,
            ],
            [
                'title' => 'My Modular Deity',
                'slug' => 'my-modular-deity',
                'category' => 'entretenimento',
                'summary' => 'Companheiro de desktop sobre o Miku Miku Dance: a pessoa traz modelo, dança, pose e acessório, e o personagem conversa e escolhe um gesto dessa lista.',
                'description' => "O Miku Miku Dance continua sendo o lugar de criar. Este programa é o lugar de usar o que a comunidade já fez. O configurador recebe modelo, movimento, pose e acessório. O personagem fica solto na área de trabalho, com fundo transparente, e escolhe o que fazer a partir dos arquivos enviados.\n\nO aplicativo é em Python. O corpo 3D é desenhado em OpenGL, pela biblioteca saba, numa janela nativa. O configurador abre numa página em WebView2. A conversa pode ser local, no Gemini ou no Ollama. Se o gesto não está na lista, o corpo não inventa um.",
                'url' => null,
                'repository_url' => 'https://github.com/ElianderG/MyModularDeity',
                'image' => null,
                'images' => null,
                'stack' => ['Python', 'OpenGL', 'WebView2', 'Gemini', 'Ollama'],
                'sort_order' => 3,
            ],
        ];

        Project::query()
            ->whereNotIn('slug', array_column($projects, 'slug'))
            ->delete();

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
            ['name' => 'Git', 'category' => 'Infra e deploy', 'sort_order' => 21],
            ['name' => 'GitHub', 'category' => 'Infra e deploy', 'sort_order' => 22],
            ['name' => 'GitHub Actions', 'category' => 'Infra e deploy', 'sort_order' => 23],
            ['name' => 'Docker', 'category' => 'Infra e deploy', 'sort_order' => 24],
            ['name' => 'Linux', 'category' => 'Infra e deploy', 'sort_order' => 25],
            ['name' => 'Nginx', 'category' => 'Infra e deploy', 'sort_order' => 26],
            ['name' => 'PM2', 'category' => 'Infra e deploy', 'sort_order' => 27],
            ['name' => 'Hostinger', 'category' => 'Infra e deploy', 'sort_order' => 28],
            ['name' => 'Cloudflare', 'category' => 'Infra e deploy', 'sort_order' => 29],
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
