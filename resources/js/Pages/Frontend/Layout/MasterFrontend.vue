<script setup>
import "@/css/theme.min.css";

import Navigation from './Navigation.vue';
import Footer from './Footer.vue';

defineProps({
    categories: Array,
})
</script>
<template>

    <Head>
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FreshCart - Online Grocery Shopping Platform</title>
    </Head>

    <Navigation :categories />

    <slot />

    <Footer />

</template>