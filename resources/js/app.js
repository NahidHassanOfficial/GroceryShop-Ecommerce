import "./bootstrap";

import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import { ZiggyVue } from "/vendor/tightenco/ziggy";
import MasterLayout from "./Pages/Master.vue";

import "vue3-toastify/dist/index.css";

import $ from "jquery";
window.$ = $;

import "bootstrap";
import "bootstrap-icons/font/bootstrap-icons.min.css";

import "@/css/feather-icons.css";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || MasterLayout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Head", Head)
            .component("Link", Link)
            .mount(el);
    },
    progress: {
        color: "#0aad0a",
    },
});
