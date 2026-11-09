<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import SocialIcon from '../components/SocialIcon.vue';
import SocialLinks from '../components/SocialLinks.vue';

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

const givenName = computed(() => props.profile.name.split(' ')[0]);
const familyName = computed(() => props.profile.name.split(' ').slice(1).join(' '));
</script>

<template>
    <Head>
        <meta head-key="description" name="description" :content="profile.summary">
    </Head>

    <section class="mx-auto grid max-w-5xl items-center gap-10 px-6 py-14 md:grid-cols-[16.5rem_1fr] md:gap-14 md:py-20">
        <img
            src="/brand/eliander.jpg"
            alt="Foto de Eliander Gomes"
            class="mx-auto aspect-[4/5] w-full max-w-64 rounded-[2rem] object-cover object-[center_18%] shadow-[0_24px_70px_-28px_rgba(158,182,255,0.7)] ring-1 ring-white/20"
        >
        <div>
            <p class="text-sm font-medium tracking-[0.22em] text-accent uppercase">
                {{ profile.role }}
            </p>
            <h1 class="mt-4 font-serif text-6xl leading-[0.92] tracking-tight md:text-7xl">
                {{ givenName }}
                <span v-if="familyName" class="italic text-accent">{{ familyName }}</span>
            </h1>
            <p class="mt-6 max-w-xl text-lg leading-relaxed text-ink/90 md:text-xl">
                {{ profile.summary }}
            </p>
            <p class="mt-4 text-sm leading-relaxed text-muted">
                {{ profile.location }} · {{ profile.education }}
            </p>
            <div class="mt-8 flex gap-8">
                <p>
                    <span class="block font-serif text-3xl">{{ projects.length }}</span>
                    <span class="text-sm text-muted">{{ projects.length === 1 ? 'projeto' : 'projetos' }}</span>
                </p>
                <p>
                    <span class="block font-serif text-3xl">{{ skills.length }}</span>
                    <span class="text-sm text-muted">{{ skills.length === 1 ? 'capacidade' : 'capacidades' }}</span>
                </p>
            </div>
            <a
                class="mt-8 inline-flex items-center gap-2 text-sm font-medium text-accent underline decoration-accent/40 underline-offset-4 hover:decoration-accent"
                href="#contato"
            >
                Falar de um projeto
            </a>
        </div>
    </section>

    <section id="trabalho" class="scroll-mt-24 border-t border-line">
        <div class="mx-auto max-w-5xl px-6 py-16 md:py-20">
            <p class="text-sm font-medium tracking-[0.22em] text-accent uppercase">Trabalho</p>
            <h2 class="mt-3 font-serif text-5xl tracking-tight md:text-6xl">Projetos</h2>
            <p class="mt-4 max-w-xl text-muted">Sistemas, sites e experiências que eu construí do início ao fim.</p>

            <p v-if="projects.length === 0" class="mt-10 text-muted">
                Nenhum projeto publicado ainda.
            </p>

            <div v-else class="mt-10 grid gap-4">
                <Link
                    v-for="(project, index) in projects"
                    :key="project.id"
                    :href="project.href"
                    class="group rounded-3xl border border-line bg-white/[0.03] p-6 transition hover:border-accent/50 hover:bg-white/[0.06] md:p-8"
                >
                    <span class="flex items-center justify-between gap-4 text-sm">
                        <span class="font-serif text-lg text-accent">
                            {{ String(index + 1).padStart(2, '0') }}
                        </span>
                        <span class="text-muted transition group-hover:text-accent">Ver projeto</span>
                    </span>
                    <span class="mt-4 block font-serif text-3xl tracking-tight md:text-4xl">
                        {{ project.title }}
                    </span>
                    <span class="mt-3 block max-w-2xl leading-relaxed text-muted">
                        {{ project.summary }}
                    </span>
                    <span v-if="project.stack.length" class="mt-5 flex flex-wrap gap-2">
                        <span
                            v-for="item in project.stack"
                            :key="item"
                            class="rounded-full bg-white/5 px-3 py-1 text-sm text-ink/85 ring-1 ring-white/10"
                        >
                            {{ item }}
                        </span>
                    </span>
                </Link>
            </div>
        </div>
    </section>

    <section id="capacidades" class="scroll-mt-24 border-t border-line">
        <div class="mx-auto max-w-5xl px-6 py-16 md:py-20">
            <p class="text-sm font-medium tracking-[0.22em] text-accent uppercase">Capacidades</p>
            <h2 class="mt-3 font-serif text-5xl tracking-tight md:text-6xl">Com o que eu trabalho</h2>

            <p v-if="skillGroups.length === 0" class="mt-10 text-muted">
                Nenhuma capacidade cadastrada ainda.
            </p>

            <div v-else class="mt-10 grid gap-10 sm:grid-cols-2 xl:grid-cols-4">
                <article v-for="group in skillGroups" :key="group.category">
                    <h3 class="text-sm font-medium tracking-[0.16em] text-muted uppercase">
                        {{ group.category }}
                    </h3>
                    <ul class="mt-4 flex flex-wrap gap-2">
                        <li
                            v-for="skill in group.skills"
                            :key="skill.id"
                            class="rounded-full bg-white/5 px-3 py-1.5 text-sm ring-1 ring-white/10"
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
            <div class="rounded-[2rem] border border-line bg-white/[0.04] px-6 py-10 md:px-12 md:py-14">
                <p class="text-sm font-medium tracking-[0.22em] text-accent uppercase">Contato</p>
                <h2 class="mt-3 max-w-xl font-serif text-4xl tracking-tight md:text-6xl">
                    Se quiser falar de um projeto, é por aqui.
                </h2>
                <p class="mt-4 max-w-lg leading-relaxed text-muted">
                    O e-mail chega direto. No LinkedIn, GitHub e Instagram dá para ver o trabalho e o dia a dia.
                </p>
                <a
                    class="mt-8 inline-flex items-center gap-3 rounded-full bg-accent px-5 py-3 font-medium text-paper transition hover:bg-ink"
                    :href="`mailto:${profile.email}`"
                >
                    <SocialIcon name="mail" />
                    {{ profile.email }}
                </a>
                <div class="mt-8">
                    <SocialLinks :profile="profile" />
                </div>
            </div>
        </div>
    </section>
</template>
