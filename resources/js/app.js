import "./bootstrap";

import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/vue3'

import MainLayout from './Layouts/MainLayout.vue'

import { ZiggyVue } from 'ziggy';

import { Ziggy } from './ziggy';



createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`].default

        page.layout ??= MainLayout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link', Link)
            .use(ZiggyVue, Ziggy)
            .mixin({ methods: { route } })
            .mount(el)
    },
})
