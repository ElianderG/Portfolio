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
            'Backend' => ['PHP', 'Laravel', 'REST API', 'Node.js', 'JavaScript', 'Python', 'Filas e workers', 'WebSockets'],
            'Frontend' => ['Vue.js', 'Inertia', 'React', 'Next.js', 'React Native', 'Flutter', 'TypeScript', 'Alpine.js', 'Livewire', 'Tailwind CSS', 'WordPress', 'WooCommerce', 'Elementor'],
            'Dados' => ['MySQL', 'PostgreSQL', 'Redis', 'Prisma', 'Meilisearch'],
            'Infra e deploy' => ['Git', 'GitHub', 'GitHub Actions', 'Docker', 'Linux', 'Nginx', 'PM2', 'Supervisor', "Let's Encrypt", 'phpMyAdmin', 'Hostinger', 'KingHost', 'CloudPanel', 'Vercel', 'Cloudflare', 'Registro.br'],
            'Pagamentos' => ['Asaas', 'Pix', 'Mercado Pago', 'Pagar.me', 'Stripe', 'PayPal', 'Cielo'],
            'Integrações' => ['API do WhatsApp', 'API da Meta', 'Google Analytics', 'Google Auth', 'OpenAI', 'Gemini', 'Ollama', 'Conta Azul', 'NF-e', 'Resend', 'E-mail SMTP', 'OneSignal', 'Playwright', 'Google Play e App Store'],
        ];

        $featured = [
            'PHP', 'Laravel', 'Vue.js', 'Inertia', 'Tailwind CSS', 'MySQL', 'Docker',
            'REST API', 'GitHub', 'Nginx', 'PM2', 'Hostinger', 'Cloudflare',
            'Asaas', 'PayPal', 'Pagar.me',
            'API do WhatsApp', 'API da Meta', 'Google Auth', 'NF-e', 'OneSignal', 'Google Play e App Store',
        ];

        $names = array_merge(...array_values($skills));

        Skill::query()
            ->whereNotIn('name', $names)
            ->delete();

        $order = 0;

        foreach ($skills as $category => $items) {
            foreach ($items as $name) {
                Skill::query()->updateOrCreate(
                    ['name' => $name],
                    ['category' => $category, 'featured' => in_array($name, $featured, true), 'sort_order' => ++$order],
                );
            }
        }
    }
}
