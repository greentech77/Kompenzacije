require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { createI18n } from 'vue-i18n'
import { get as getLocale } from './services/locale'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    async setup({ el, app, props, plugin }) {

        data = await getLocale()
        localStorage.setItem('locale', data.locale);
        console.log(data.locale);
        const i18n = createI18n({...data})

        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(i18n)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
