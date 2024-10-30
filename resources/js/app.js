import "./bootstrap";

import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import MasterLayout from "./Pages/Master.vue";

import Toast from "vue3-toastify";
import "vue3-toastify/dist/index.css";

import $ from "jquery";
window.$ = $;

import "bootstrap";
// import "../css/bootstrap-customized.scss";
import "bootstrap-icons/font/bootstrap-icons.min.css";

import "@/css/feather-icons.css";

// import "simplebar/dist/simplebar.min.css";
// import "nouislider/dist/nouislider.min.css";
// import "tiny-slider/dist/tiny-slider.css";

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
            .use(Toast, {
                autoClose: 3000,
            })
            .component("Head", Head)
            .component("Link", Link)
            .mount(el);
    },
    progress: {
        color: "#0aad0a",
    },
});
