import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue)
            .mount(el)
    }
    ,
})
