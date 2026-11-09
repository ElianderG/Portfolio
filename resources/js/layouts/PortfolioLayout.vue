<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import SocialLinks from '../components/SocialLinks.vue';

const page = usePage();
const profile = computed(() => page.props.profile);
</script>

<template>
    <div class="min-h-screen">
        <a
            href="#conteudo"
            class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-20 focus:bg-ink focus:px-3 focus:py-2 focus:text-paper"
        >
            Ir para o conteúdo
        </a>

        <header class="sticky top-0 z-10 border-b border-line/80 bg-paper/80 backdrop-blur-md">
            <div class="mx-auto flex max-w-5xl flex-wrap items-center justify-between gap-x-6 gap-y-3 px-6 py-4">
                <Link :href="profile.home" class="shrink-0">
                    <img src="/brand/logo.svg" alt="Eliander Gomes" class="h-12 w-auto">
                </Link>

                <nav class="flex w-full flex-wrap items-center gap-1 text-sm sm:w-auto">
                    <a class="rounded-full px-3 py-1.5 text-muted hover:bg-white/5 hover:text-ink" href="/#trabalho">Trabalho</a>
                    <a class="rounded-full px-3 py-1.5 text-muted hover:bg-white/5 hover:text-ink" href="/#capacidades">Capacidades</a>
                    <a class="rounded-full bg-accent px-3 py-1.5 font-medium text-paper hover:bg-ink" href="/#contato">Contato</a>
                </nav>
            </div>
        </header>

        <main id="conteudo">
            <slot />
        </main>

        <footer class="border-t border-line">
            <div class="mx-auto flex max-w-5xl flex-col gap-4 px-6 py-8 text-sm text-muted sm:flex-row sm:items-center sm:justify-between">
                <p>{{ profile.name }} · {{ profile.role }}</p>
                <SocialLinks :profile="profile" variant="icons" />
            </div>
        </footer>
    </div>
</template>
