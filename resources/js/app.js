import { createInertiaApp } from '@inertiajs/vue3';
import Layout from './layouts/PortfolioLayout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Portfolio';

createInertiaApp({
    pages: './pages',
    layout: () => Layout,
    title: (title) => (title ? `${title} — ${appName}` : appName),
    progress: {
        color: '#9eb6ff',
    },
});
