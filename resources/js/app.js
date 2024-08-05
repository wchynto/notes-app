import './bootstrap';
import 'flowbite';

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist'

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
    .component('Head', Head)
    .component('Link', Link)
      .use(plugin).use(ZiggyVue).use(VueSweetalert2)
      .mount(el)
  },
})
