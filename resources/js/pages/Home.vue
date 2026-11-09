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

const projectGroups = computed(() => [
    {
        title: 'Profissionais',
        description: 'Marketplaces, SaaS e ferramentas de produtividade.',
        projects: props.projects.filter((project) => project.category === 'profissional'),
    },
    {
        title: 'Entretenimento',
        description: 'Jogos e experimentos que eu construí para me divertir e me desafiar.',
        projects: props.projects.filter((project) => project.category === 'entretenimento'),
    },
]);

const givenName = computed(() => props.profile.name.split(' ')[0]);
const familyName = computed(() => props.profile.name.split(' ').slice(1).join(' '));
</script>

<template>
    <Head>
        <meta head-key="description" name="description" :content="profile.description">
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
            <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-4">
                <a
                    class="inline-flex items-center gap-3 rounded-full bg-accent px-5 py-3 font-medium text-paper transition hover:bg-ink"
                    href="#contato"
                >
                    <SocialIcon name="mail" />
                    Falar de um projeto
                </a>
                <a
                    class="text-sm font-medium underline decoration-line underline-offset-4 hover:text-accent hover:decoration-accent"
                    href="#trabalho"
                >
                    Ver projetos
                </a>
            </div>
        </div>
    </section>

    <section id="trabalho" class="scroll-mt-24 border-t border-line">
        <div class="mx-auto max-w-5xl px-6 py-16 md:py-20">
            <p class="text-sm font-medium tracking-[0.22em] text-accent uppercase">Trabalho</p>
            <h2 class="mt-3 font-serif text-5xl tracking-tight md:text-6xl">Projetos</h2>

            <div v-for="group in projectGroups" :key="group.title" class="mt-14">
                <h3 class="font-serif text-3xl tracking-tight md:text-4xl">{{ group.title }}</h3>
                <p class="mt-2 max-w-xl text-muted">{{ group.description }}</p>

                <p v-if="group.projects.length === 0" class="mt-6 text-muted">
                    Nenhum projeto publicado ainda.
                </p>

                <div v-else class="mt-6 grid gap-4">
                    <Link
                        v-for="project in group.projects"
                        :key="project.id"
                        :href="project.href"
                        class="group rounded-3xl border border-line bg-white/[0.03] p-6 transition hover:border-accent/50 hover:bg-white/[0.06] md:p-8"
                    >
                        <span class="flex items-start justify-between gap-4">
                            <span class="block text-2xl font-semibold tracking-tight md:text-3xl">
                                {{ project.title }}
                            </span>
                            <span class="text-sm text-muted transition group-hover:text-accent">Ver projeto</span>
                        </span>
                        <img
                            v-if="project.image"
                            :src="project.image"
                            :alt="`Tela inicial de ${project.title}`"
                            class="mt-6 w-full rounded-2xl ring-1 ring-white/10"
                        >
                        <span class="mt-6 block max-w-2xl leading-relaxed text-muted">
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
