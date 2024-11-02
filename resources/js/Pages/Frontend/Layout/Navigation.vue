<script setup>
import { Link } from '@inertiajs/vue3';
import LocationModal from '../Modals/LocationModal.vue';
import LoginModal from '../Modals/LoginModal.vue';
import ProductCartModal from '../Modals/ProductCartModal.vue';

import { cartList, totalAmmount, removeCartItem } from '../Components/Utils/CartWishManage';
</script>

<template>
    <div class="border-bottom pb-5">
        <div class="bg-light py-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12"><span> Super Value Deals - Save more with coupons</span></div>
                    <div class="col-6 text-end d-none d-md-block">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-decoration-none  text-muted" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-1">


                                    <svg width="16" height="13" viewBox="0 0 16 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#selectedlang)">
                                            <path d="M0 0.5H16V12.5H0V0.5Z" fill="#012169"></path>
                                            <path
                                                d="M1.875 0.5L7.975 5.025L14.05 0.5H16V2.05L10 6.525L16 10.975V12.5H14L8 8.025L2.025 12.5H0V11L5.975 6.55L0 2.1V0.5H1.875Z"
                                                fill="white"></path>
                                            <path
                                                d="M10.6 7.525L16 11.5V12.5L9.225 7.525H10.6ZM6 8.025L6.15 8.9L1.35 12.5H0L6 8.025ZM16 0.5V0.575L9.775 5.275L9.825 4.175L14.75 0.5H16ZM0 0.5L5.975 4.9H4.475L0 1.55V0.5Z"
                                                fill="#C8102E"></path>
                                            <path d="M6.025 0.5V12.5H10.025V0.5H6.025ZM0 4.5V8.5H16V4.5H0Z"
                                                fill="white"></path>
                                            <path d="M0 5.325V7.725H16V5.325H0ZM6.825 0.5V12.5H9.225V0.5H6.825Z"
                                                fill="#C8102E"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="selectedlang">
                                                <rect width="16" height="12" fill="white" transform="translate(0 0.5)">
                                                </rect>
                                            </clipPath>
                                        </defs>
                                    </svg>


                                </span>English
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item " href="#"><span class="me-2">


                                            <svg width="16" height="13" viewBox="0 0 16 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_5543_19736)">
                                                    <path d="M0 0.5H16V12.5H0V0.5Z" fill="#012169"></path>
                                                    <path
                                                        d="M1.875 0.5L7.975 5.025L14.05 0.5H16V2.05L10 6.525L16 10.975V12.5H14L8 8.025L2.025 12.5H0V11L5.975 6.55L0 2.1V0.5H1.875Z"
                                                        fill="white"></path>
                                                    <path
                                                        d="M10.6 7.525L16 11.5V12.5L9.225 7.525H10.6ZM6 8.025L6.15 8.9L1.35 12.5H0L6 8.025ZM16 0.5V0.575L9.775 5.275L9.825 4.175L14.75 0.5H16ZM0 0.5L5.975 4.9H4.475L0 1.55V0.5Z"
                                                        fill="#C8102E"></path>
                                                    <path d="M6.025 0.5V12.5H10.025V0.5H6.025ZM0 4.5V8.5H16V4.5H0Z"
                                                        fill="white"></path>
                                                    <path d="M0 5.325V7.725H16V5.325H0ZM6.825 0.5V12.5H9.225V0.5H6.825Z"
                                                        fill="#C8102E"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_5543_19736">
                                                        <rect width="16" height="12" fill="white"
                                                            transform="translate(0 0.5)"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>


                                        </span>English</a>
                                </li>
                                <li>
                                    <a class="dropdown-item " href="#"><span class="me-2">

                                            <svg width="16" height="13" viewBox="0 0 16 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_5543_19744)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0 0.5H16V12.5H0V0.5Z" fill="white"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0 0.5H5.3325V12.5H0V0.5Z" fill="#002654"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.668 0.5H16.0005V12.5H10.668V0.5Z" fill="#CE1126"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_5543_19744">
                                                        <rect width="16" height="12" fill="white"
                                                            transform="translate(0 0.5)"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>Bangla</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-light py-lg-5 pt-3 px-0 pb-0">
            <div class="container">
                <div class="row w-100 align-items-center g-3">
                    <div class="col-xxl-2 col-lg-3">
                        <Link class="navbar-brand d-none d-lg-block" :href="route('index')">
                        <img :src="'/images/freshcart-logo.svg'" alt="FreshCart - Grocery Shop">

                        </Link>
                        <div class="d-flex justify-content-between w-100 d-lg-none">
                            <Link class="navbar-brand" :href="route('index')">
                            <img :src="'/images/freshcart-logo.svg'" alt="FreshCart - Grocery Shop">

                            </Link>

                            <div class="d-flex align-items-center lh-1">

                                <div class="list-inline me-2">
                                    <div class="list-inline-item">

                                        <Link :href="route('profile.wish-list')" class="text-muted position-relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-heart">
                                            <path
                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                            </path>
                                        </svg>
                                        <span v-show="$page.props.wishlistCount"
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                            {{ $page.props.wishlistCount }}
                                        </span>
                                        </Link>
                                    </div>
                                    <div class="list-inline-item">

                                        <Link v-if="$page.props.isAuth" :href="route('profile')" class="text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        </Link>
                                        <a v-else href="#" class="text-muted" data-bs-toggle="modal"
                                            data-bs-target="#loginModal"> <svg xmlns="http://www.w3.org/2000/svg"
                                                width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="list-inline-item">

                                        <a class="text-muted  position-relative" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasRight" href="#offcanvasExample" role="button"
                                            aria-controls="offcanvasRight">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-shopping-bag">
                                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                <line x1="3" y1="6" x2="21" y2="6">
                                                </line>
                                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                                            </svg>
                                            <span v-show="cartList.length"
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                                {{ cartList.length }}
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                        </a>
                                    </div>

                                </div>
                                <!-- Button -->
                                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#navbar-default" aria-controls="navbar-default"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar top-bar mt-0"></span>
                                    <span class="icon-bar middle-bar"></span>
                                    <span class="icon-bar bottom-bar"></span>
                                </button>

                            </div>
                        </div>

                    </div>
                    <div class="col-xxl-6 col-lg-5 d-none d-lg-block">

                        <form action="#" class="search-header">


                            <div class="input-group">
                                <input type="text" class="form-control border-end.0" placeholder="Search for products.."
                                    aria-label="Search for products.." aria-describedby="basic-addon2">
                                <span class="input-group-text bg-transparent" id="basic-addon2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 col-xxl-3 d-none d-lg-block">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn  btn-outline-gray-400 text-muted" data-bs-toggle="modal"
                            data-bs-target="#locationModal">
                            <i class="feather-icon icon-map-pin me-2"></i>Location
                        </button>


                    </div>
                    <div class="col-md-2 col-xxl-1 text-end d-none d-lg-block">

                        <div class="list-inline">
                            <div class="list-inline-item">

                                <Link :href="route('profile.wish-list')" class="text-muted position-relative">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-heart">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg>
                                <span v-show="$page.props.wishlistCount"
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                    {{ $page.props.wishlistCount }}
                                </span>
                                </Link>
                            </div>
                            <div class="list-inline-item">

                                <Link v-if="$page.props.isAuth" :href="route('profile')" class="text-muted"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                </Link>
                                <a v-else href="#" class="text-muted" data-bs-toggle="modal"
                                    data-bs-target="#loginModal"> <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </a>
                            </div>
                            <div class="list-inline-item">

                                <a class="text-muted position-relative " data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" href="#offcanvasExample" role="button"
                                    aria-controls="offcanvasRight">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-shopping-bag">
                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                    </svg>
                                    <span v-show="cartList.length"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                        {{ cartList.length }}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </a>

                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light navbar-default pt-0 pb-0">
            <div class="container px-0 px-md-3">

                <div class="dropdown me-3 d-none d-lg-block">
                    <button class="btn btn-primary px-6 " type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg></span> All Departments
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Dairy, Bread &amp; Eggs</a></li>
                        <li><a class="dropdown-item" href="#">Snacks &amp; Munchies</a></li>
                        <li><a class="dropdown-item" href="#">Fruits &amp; Vegetables</a></li>
                        <li><a class="dropdown-item" href="#">Cold Drinks &amp; Juices</a></li>
                        <li><a class="dropdown-item" href="#">Breakfast &amp; Instant Food</a></li>
                        <li><a class="dropdown-item" href="#">Bakery &amp; Biscuits</a></li>

                        <li><a class="dropdown-item" href="#">Chicken, Meat &amp; Fish</a></li>
                    </ul>
                </div>



                <div class="offcanvas offcanvas-start p-4 p-lg-0" id="navbar-default">

                    <div class="d-flex justify-content-between align-items-center mb-2 d-block d-lg-none">
                        <div><img :src="'/images/freshcart-logo.svg'" alt="FreshCart - Grocery Shop">
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="d-block d-lg-none mb-2 pt-2">
                        <a class="btn btn-primary w-100 d-flex justify-content-center align-items-center"
                            data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg></span> All Departments
                        </a>
                        <div class="collapse mt-2" id="collapseExample">
                            <div class="card card-body">
                                <ul class="mb-0 list-unstyled">
                                    <li><a class="dropdown-item" href="#">Dairy, Bread &amp; Eggs</a></li>
                                    <li><a class="dropdown-item" href="#">Snacks &amp; Munchies</a></li>
                                    <li><a class="dropdown-item" href="#">Fruits &amp; Vegetables</a></li>
                                    <li><a class="dropdown-item" href="#">Cold Drinks &amp; Juices</a></li>
                                    <li><a class="dropdown-item" href="#">Breakfast &amp; Instant Food</a></li>
                                    <li><a class="dropdown-item" href="#">Bakery &amp; Biscuits</a></li>

                                    <li><a class="dropdown-item" href="#">Chicken, Meat &amp; Fish</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="d-lg-none d-block mb-3">
                        <button type="button" class="btn  btn-outline-gray-400 text-muted w-100 " data-bs-toggle="modal"
                            data-bs-target="#locationModal">
                            <i class="feather-icon icon-map-pin me-2"></i>Pick Location
                        </button>
                    </div>
                    <div class="d-none d-lg-block">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown">
                                <Link class="nav-link dropdown-toggle" :href="route('index')" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Home
                                </Link>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Shop
                                </a>
                                <ul class="dropdown-menu">

                                    <li><a class="dropdown-item" href="#">Shop List - Filter</a></li>

                                    <li><a class="dropdown-item" href="#">Product Page</a></li>
                                </ul>
                            </li>


                            <li class="nav-item dropdown dropdown-fullwidth">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Mega menu
                                </a>
                                <div class=" dropdown-menu pb-0">

                                    <div class="row p-2 p-lg-4">
                                        <div class="col-lg-3 col-6 mb-4 mb-lg-0">
                                            <h6 class="text-primary ps-3">Dairy, Bread &amp; Eggs</h6>
                                            <a class="dropdown-item" href="#">Butter</a>
                                            <a class="dropdown-item" href="#">Milk Drinks</a>
                                            <a class="dropdown-item" href="#">Curd &amp; Yogurt</a>
                                            <a class="dropdown-item" href="#">Eggs</a>
                                            <a class="dropdown-item" href="#">Buns &amp; Bakery</a>
                                            <a class="dropdown-item" href="#">Cheese</a>
                                            <a class="dropdown-item" href="#">Condensed Milk</a>
                                            <a class="dropdown-item" href="#">Dairy Products</a>

                                        </div>
                                        <div class="col-lg-3 col-6 mb-4 mb-lg-0">
                                            <h6 class="text-primary ps-3">Breakfast &amp; Instant Food</h6>
                                            <a class="dropdown-item" href="#">Breakfast Cereal</a>
                                            <a class="dropdown-item" href="#"> Noodles, Pasta &amp; Soup</a>
                                            <a class="dropdown-item" href="#">Frozen Veg Snacks</a>
                                            <a class="dropdown-item" href="#"> Frozen Non-Veg Snacks</a>
                                            <a class="dropdown-item" href="#"> Vermicelli</a>
                                            <a class="dropdown-item" href="#"> Instant Mixes</a>
                                            <a class="dropdown-item" href="#"> Batter</a>
                                            <a class="dropdown-item" href="#"> Fruit and Juices</a>

                                        </div>
                                        <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                                            <h6 class="text-primary ps-3">Cold Drinks &amp; Juices</h6>
                                            <a class="dropdown-item" href="#">Soft Drinks</a>
                                            <a class="dropdown-item" href="#">Fruit Juices</a>
                                            <a class="dropdown-item" href="#">Coldpress</a>
                                            <a class="dropdown-item" href="#">Water &amp; Ice Cubes</a>
                                            <a class="dropdown-item" href="#">Soda &amp; Mixers</a>
                                            <a class="dropdown-item" href="#">Health Drinks</a>
                                            <a class="dropdown-item" href="#">Herbal Drinks</a>
                                            <a class="dropdown-item" href="#">Milk Drinks</a>


                                        </div>
                                        <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                                            <div class="card border-0">
                                                <img :src="'/images/menu-banner.jpg'" alt="FreshCart - Grocery Shop"
                                                    class="img-fluid rounded-3">
                                                <div class="position-absolute ps-6 mt-8">
                                                    <h5 class=" mb-0 ">Dont miss this <br>offer today.</h5>
                                                    <a href="#" class="btn btn-primary btn-sm mt-3">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Pages
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">About Us</a></li>
                                    <li><a class="dropdown-item" href="#">Contact Us</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="d-block d-lg-none">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown">
                                <Link class="nav-link dropdown-toggle" :href="route('index')" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Home
                                </Link>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Shop
                                </a>
                                <ul class="dropdown-menu">


                                    <li><a class="dropdown-item" href="#">Shop List - Filter</a></li>
                                    <li><a class="dropdown-item" href="#">Product Page</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Mega Menu
                                </a>
                                <ul class="dropdown-menu">

                                    <li class="dropdown-submenu ">
                                        <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                            Dairy, Bread &amp; Eggs
                                        </a>
                                        <ul class="dropdown-menu">


                                            <li><a class="dropdown-item" href="#">Milk Drinks</a></li>
                                            <li><a class="dropdown-item" href="#">Curd &amp; Yogurt</a></li>
                                            <li> <a class="dropdown-item" href="#">Eggs</a></li>
                                            <li><a class="dropdown-item" href="#">Buns &amp; Bakery</a></li>
                                            <li><a class="dropdown-item" href="#">Cheese</a></li>
                                            <li> <a class="dropdown-item" href="#">Condensed Milk</a></li>
                                            <li><a class="dropdown-item" href="#">Dairy Products</a></li>


                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu ">
                                        <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                            Vegetables &amp; Fruits
                                        </a>
                                        <ul class="dropdown-menu">


                                            <li><a class="dropdown-item" href="#">Vegetables</a></li>
                                            <li><a class="dropdown-item" href="#">Fruits</a></li>
                                            <li><a class="dropdown-item" href="#">Exotics &amp; Premium</a></li>
                                            <li><a class="dropdown-item" href="#">Fresh Sprouts</a></li>
                                            <li><a class="dropdown-item" href="#">Frozen Veg</a></li>



                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu ">
                                        <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                            Cold Drinks &amp; Juices
                                        </a>
                                        <ul class="dropdown-menu">


                                            <li><a class="dropdown-item" href="#">Soft Drinks</a></li>
                                            <li><a class="dropdown-item" href="#">Fruit Juices</a></li>
                                            <li><a class="dropdown-item" href="#">Coldpress</a></li>
                                            <li><a class="dropdown-item" href="#">Soda &amp; Mixers</a></li>
                                            <li><a class="dropdown-item" href="#">Milk Drinks</a></li>
                                            <li><a class="dropdown-item" href="#">Health Drinks</a></li>
                                            <li><a class="dropdown-item" href="#">Herbal Drinks</a></li>



                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Pages
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">About Us</a></li>
                                    <li><a class="dropdown-item" href="#">Contact Us</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>

        </nav>
    </div>

    <LocationModal />
    <LoginModal />
    <ProductCartModal :cartList=cartList :totalAmmount="totalAmmount" :removeCartItem="removeCartItem" />
</template>