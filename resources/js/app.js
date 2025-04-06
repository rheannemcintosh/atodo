import './bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';

window.Alpine = Alpine;
Alpine.start();

createInertiaApp({
    resolve: name => import(`./Pages/${name}.vue`),
    setup({ el, App, props }) {
        createApp({ render: () => h(App, props) }).mount(el);
    },
});
