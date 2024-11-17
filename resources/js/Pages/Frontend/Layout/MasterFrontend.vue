<script setup>
import "@/css/theme.min.css";

import Navigation from './Navigation.vue';
import Footer from './Footer.vue';

</script>
<template>

    <Head>
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FreshCart - Online Grocery Shopping Platform</title>
    </Head>

    <Navigation />

    <slot />

    <Footer />

</template>