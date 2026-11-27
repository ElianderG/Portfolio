# Portfolio

Landing do Eliander Gomes. Uma página com os projetos e as capacidades, e uma página para cada projeto.

PHP 8.3, Laravel 13, Vue 3, Inertia, Tailwind CSS 4 e SQLite. O front é compilado com Vite.

## Rodar

```sh
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm install
composer run dev
```

O site abre em `http://localhost:8000`.

## Conteúdo

A identidade fica em `config/portfolio.php`: nome, texto de apresentação, localização e links.

Projetos e capacidades ficam em `database/seeders/PortfolioSeeder.php`. Depois de editar:

```sh
php artisan db:seed
```

Um projeto entra em **Profissionais** com `category` `profissional` e em **Entretenimento** com `entretenimento`. A imagem do card é `image`. As outras telas ficam em `images` e só aparecem na página do projeto. Os arquivos vão em `public/projects`.

Uma capacidade marcada em `$featured` aparece em destaque. A ordem desses destaques também está em `featuredOrder`, em `resources/js/pages/Home.vue`.

## Testes

```sh
composer test
```
