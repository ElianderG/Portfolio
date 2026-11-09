<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const profile = computed(() => page.props.profile);

const links = computed(() => [
    { label: 'LinkedIn', href: profile.value.linkedin },
    { label: 'GitHub', href: profile.value.github },
    { label: profile.value.email, href: `mailto:${profile.value.email}` },
]);
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
                <Link :href="profile.home" class="text-sm font-medium tracking-[0.16em] uppercase">
                    {{ profile.name }}
                </Link>

                <nav class="flex w-full flex-wrap gap-x-5 gap-y-2 text-sm text-muted sm:w-auto">
                    <a class="hover:text-ink" href="/#trabalho">Trabalho</a>
                    <a class="hover:text-ink" href="/#capacidades">Capacidades</a>
                    <a class="hover:text-ink" href="/#contato">Contato</a>
                </nav>
            </div>
        </header>

        <main id="conteudo">
            <slot />
        </main>

        <footer class="border-t border-line">
            <div class="mx-auto flex max-w-5xl flex-col gap-4 px-6 py-8 text-sm text-muted sm:flex-row sm:items-center sm:justify-between">
                <p>{{ profile.name }} · {{ profile.role }}</p>
                <div class="flex flex-wrap gap-x-5 gap-y-2">
                    <a
                        v-for="link in links"
                        :key="link.href"
                        class="underline decoration-line underline-offset-4 hover:text-accent hover:decoration-accent"
                        :href="link.href"
                        :rel="link.href.startsWith('http') ? 'noopener noreferrer' : undefined"
                        :target="link.href.startsWith('http') ? '_blank' : undefined"
                    >
                        {{ link.label }}
                    </a>
                </div>
            </div>
        </footer>
    </div>
</template>
