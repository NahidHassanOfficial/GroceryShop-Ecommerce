<script setup>
defineProps({
    categories: Array,
});
import { onMounted, ref } from 'vue';
// import 'slick-carousel';
// import "slick-carousel/slick/slick.css";
// import "slick-carousel/slick/slick-theme.css";

onMounted(() => {
    $('.category-slider').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        dots: false,
        arrows: true,
        prevArrow: '<span class="slick-prev"><i class="feather-icon icon-chevron-left"></i></span>',
        nextArrow: '<span class="slick-next"><i class="feather-icon icon-chevron-right"></i></span>',
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                },
            },
            {
                breakpoint: 820,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
        ],
    });
});
</script>

<template>
    <section class="mb-lg-10 mt-lg-14 my-8">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-6">
                    <h3 class="mb-0">Featured Categories</h3>
                </div>
            </div>
            <div class="category-slider ">
                <div class="item" v-for="category in categories" :key="category.slug">
                    <a :href="route('category.view', category.slug)" class="text-decoration-none text-inherit">
                        <div class="card card-product mb-4">
                            <div class="card-body text-center py-8">
                                <img :src="`images/categories/${category.image}`" alt="Grocery Ecommerce Template"
                                    class="mb-3 img-fluid">
                                <div>{{ category.name }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>