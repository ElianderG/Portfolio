<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    project: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head :title="project.title">
        <meta head-key="description" name="description" :content="project.summary">
    </Head>

    <article class="mx-auto max-w-3xl px-6 py-16 md:py-24">
        <Link class="text-sm hover:text-accent" href="/#trabalho">
            ← Projetos
        </Link>

        <h1 class="mt-8 text-5xl tracking-tight md:text-6xl">
            {{ project.title }}
        </h1>
        <p class="mt-6 text-lg leading-relaxed text-muted">
            {{ project.summary }}
        </p>

        <ul v-if="project.stack.length" class="mt-8 flex flex-wrap gap-2">
            <li
                v-for="item in project.stack"
                :key="item"
                class="border border-line px-3 py-1.5 text-sm"
            >
                {{ item }}
            </li>
        </ul>

        <div class="mt-10 max-w-2xl text-lg leading-relaxed whitespace-pre-line">
            {{ project.description }}
        </div>

        <div v-if="project.url || project.repository_url" class="mt-10 flex flex-wrap gap-6 text-sm">
            <a
                v-if="project.url"
                class="underline decoration-line underline-offset-4 hover:text-accent hover:decoration-accent"
                :href="project.url"
                rel="noopener noreferrer"
                target="_blank"
            >
                Abrir o site
            </a>
            <a
                v-if="project.repository_url"
                class="underline decoration-line underline-offset-4 hover:text-accent hover:decoration-accent"
                :href="project.repository_url"
                rel="noopener noreferrer"
                target="_blank"
            >
                Ver o código
            </a>
        </div>
    </article>
</template>
