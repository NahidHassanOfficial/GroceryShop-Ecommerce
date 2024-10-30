<script setup>
import "simplebar/dist/simplebar.min.css";
import "@/back-end/css/theme.min.css";
// import "@/back-end/js/simplebar.min.js";
// import "@/back-end/js/bootstrap.bundle.min.js";
// import "@/back-end/js/jquery.min.js";
// import "@/back-end/js/theme.min.js";

import Navigation from './Navigation.vue';
</script>
<template>

    <Head>
        <title>FreshCart - Dashboard</title>
    </Head>
    <Navigation>
        <slot />
    </Navigation>
</template>