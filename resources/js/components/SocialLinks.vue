<script setup>
import { computed } from 'vue';
import SocialIcon from './SocialIcon.vue';

const props = defineProps({
    profile: {
        type: Object,
        required: true,
    },
    variant: {
        type: String,
        default: 'cards',
    },
});

const networks = computed(() => [
    {
        key: 'linkedin',
        label: 'LinkedIn',
        hint: 'Perfil profissional',
        href: props.profile.linkedin,
    },
    {
        key: 'github',
        label: 'GitHub',
        hint: 'Código e projetos',
        href: props.profile.github,
    },
    {
        key: 'instagram',
        label: 'Instagram',
        hint: 'Dia a dia',
        href: props.profile.instagram,
    },
    {
        key: 'mail',
        label: 'E-mail',
        hint: props.profile.email,
        href: `mailto:${props.profile.email}`,
    },
]);

const items = computed(() => (
    props.variant === 'icons'
        ? networks.value
        : networks.value.filter((item) => item.key !== 'mail')
));
</script>

<template>
    <div v-if="variant === 'icons'" class="flex flex-wrap gap-2">
        <a
            v-for="item in items"
            :key="item.key"
            class="grid size-10 place-items-center rounded-full border border-line text-muted transition hover:border-accent hover:text-accent"
            :href="item.href"
            :aria-label="item.key === 'mail' ? item.hint : item.label"
            :rel="item.href.startsWith('http') ? 'noopener noreferrer' : undefined"
            :target="item.href.startsWith('http') ? '_blank' : undefined"
        >
            <SocialIcon :name="item.key" />
        </a>
    </div>

    <div v-else class="grid gap-3 sm:grid-cols-3">
        <a
            v-for="item in items"
            :key="item.key"
            class="group flex items-center gap-4 rounded-2xl border border-line bg-paper/40 px-4 py-4 transition hover:border-accent/60 hover:bg-white/5"
            :href="item.href"
            rel="noopener noreferrer"
            target="_blank"
        >
            <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-accent/15 text-accent transition group-hover:bg-accent group-hover:text-paper">
                <SocialIcon :name="item.key" />
            </span>
            <span>
                <span class="block font-medium">{{ item.label }}</span>
                <span class="mt-0.5 block text-sm text-muted">{{ item.hint }}</span>
            </span>
        </a>
    </div>
</template>
