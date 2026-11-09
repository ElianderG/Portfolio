<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    profile: {
        type: Object,
        required: true,
    },
    skills: {
        type: Array,
        required: true,
    },
    projects: {
        type: Array,
        required: true,
    },
});

const skillGroups = computed(() => {
    const groups = [];

    for (const skill of props.skills) {
        let group = groups.find((item) => item.category === skill.category);

        if (!group) {
            group = { category: skill.category, skills: [] };
            groups.push(group);
        }

        group.skills.push(skill);
    }

    return groups;
});

function label(count, singular, plural) {
    return `${count} ${count === 1 ? singular : plural}`;
}
</script>

<template>
    <Head>
        <meta head-key="description" name="description" :content="profile.summary">
    </Head>

    <section class="mx-auto max-w-5xl px-6 pt-20 pb-16 md:pt-28 md:pb-24">
        <p class="text-sm font-medium tracking-[0.18em] text-accent uppercase">
            {{ profile.role }}
        </p>
        <h1 class="mt-4 max-w-4xl font-serif text-6xl tracking-tight md:text-8xl">
            {{ profile.name }}
        </h1>
        <p class="mt-8 max-w-2xl text-lg leading-relaxed text-muted md:text-xl">
            {{ profile.summary }}
        </p>
        <p class="mt-6 text-sm text-muted">
            {{ label(projects.length, 'projeto', 'projetos') }}
            ·
            {{ label(skills.length, 'capacidade', 'capacidades') }}
        </p>
        <span class="mt-10 block h-0.5 w-12 bg-accent" aria-hidden="true" />
    </section>

    <section id="trabalho" class="scroll-mt-24 border-t border-line">
        <div class="mx-auto max-w-5xl px-6 py-16 md:py-20">
            <p class="text-sm font-medium tracking-[0.18em] text-accent uppercase">Trabalho</p>
            <h2 class="mt-3 font-serif text-4xl tracking-tight md:text-5xl">Projetos</h2>

            <p v-if="projects.length === 0" class="mt-10 text-muted">
                Nenhum projeto publicado ainda.
            </p>

            <div v-else class="mt-10 divide-y divide-line border-y border-line">
                <Link
                    v-for="(project, index) in projects"
                    :key="project.id"
                    :href="project.href"
                    class="group grid gap-3 py-8 md:grid-cols-[4.5rem_1fr] md:gap-8"
                >
                    <span class="font-serif text-lg text-muted">
                        {{ String(index + 1).padStart(2, '0') }}
                    </span>
                    <span>
                        <span class="block font-serif text-3xl tracking-tight group-hover:text-accent md:text-4xl">
                            {{ project.title }}
                        </span>
                        <span class="mt-3 block max-w-2xl leading-relaxed text-muted">
                            {{ project.summary }}
                        </span>
                        <span v-if="project.stack.length" class="mt-4 block text-sm">
                            {{ project.stack.join(' · ') }}
                        </span>
                    </span>
                </Link>
            </div>
        </div>
    </section>

    <section id="capacidades" class="scroll-mt-24 border-t border-line">
        <div class="mx-auto max-w-5xl px-6 py-16 md:py-20">
            <p class="text-sm font-medium tracking-[0.18em] text-accent uppercase">Capacidades</p>
            <h2 class="mt-3 font-serif text-4xl tracking-tight md:text-5xl">O que eu uso para construir</h2>

            <p v-if="skillGroups.length === 0" class="mt-10 text-muted">
                Nenhuma capacidade cadastrada ainda.
            </p>

            <div v-else class="mt-10 grid gap-10 md:grid-cols-3">
                <article v-for="group in skillGroups" :key="group.category">
                    <h3 class="text-sm font-medium tracking-[0.16em] text-muted uppercase">
                        {{ group.category }}
                    </h3>
                    <ul class="mt-4 flex flex-wrap gap-2">
                        <li
                            v-for="skill in group.skills"
                            :key="skill.id"
                            class="border border-line px-3 py-1.5 text-sm"
                        >
                            {{ skill.name }}
                        </li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section id="contato" class="scroll-mt-24 border-t border-line">
        <div class="mx-auto max-w-5xl px-6 py-16 md:py-24">
            <p class="text-sm font-medium tracking-[0.18em] text-accent uppercase">Contato</p>
            <h2 class="mt-3 max-w-xl font-serif text-4xl tracking-tight md:text-5xl">
                Vamos conversar sobre o próximo produto.
            </h2>
            <a
                class="mt-8 inline-block text-lg underline decoration-line underline-offset-4 hover:text-accent hover:decoration-accent"
                :href="`mailto:${profile.email}`"
            >
                {{ profile.email }}
            </a>
        </div>
    </section>
</template>
