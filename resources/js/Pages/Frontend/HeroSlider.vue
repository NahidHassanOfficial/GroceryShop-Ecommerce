<script setup>
import { onMounted } from 'vue';
import 'slick-carousel';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
onMounted(() => {
    $('.hero-slider').slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
});
</script>
<template>
    <section class="mt-8">
        <div class="container">
            <div class="hero-slider ">

                <div
                    style="background: url(images/banner/slider-1.webp)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                    <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                        <span class="badge text-bg-warning">Opening Sale Discount 50%</span>

                        <h2 class="text-dark display-5 fw-bold mt-4">SuperMarket Daily <br> Fresh Grocery </h2>
                        <p class="lead">Introduced a new model for online grocery shopping
                            and convenient home delivery.</p>
                        <a href="#!" class="btn btn-dark mt-3">Shop Now <i
                                class="feather-icon icon-arrow-right ms-1"></i></a>
                    </div>

                </div>
                <div
                    style="background: url(images/banner/slider-2.jpg)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                    <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                        <span class="badge text-bg-warning">Free Shipping - orders over $100</span>
                        <h2 class="text-dark display-5 fw-bold mt-4">Free Shipping on <br> orders over <span
                                class="text-primary">$100</span></h2>
                        <p class="lead">Free Shipping to First-Time Customers Only, After promotions and discounts are
                            applied.
                        </p>
                        <a href="#!" class="btn btn-dark mt-3">Shop Now <i
                                class="feather-icon icon-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <div
                    style="background: url(images/banner/slider-1.webp)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                    <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                        <span class="badge text-bg-warning">Opening Sale Discount 50%</span>

                        <h2 class="text-dark display-5 fw-bold mt-4">SuperMarket Daily <br> Fresh Grocery </h2>
                        <p class="lead">Introduced a new model for online grocery shopping
                            and convenient home delivery.</p>
                        <a href="#!" class="btn btn-dark mt-3">Shop Now <i
                                class="feather-icon icon-arrow-right ms-1"></i></a>
                    </div>

                </div>

            </div>
        </div>
    </section>
</template>