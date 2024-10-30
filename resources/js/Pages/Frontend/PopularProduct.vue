<script setup>
defineProps({
    products: String,
})
</script>
<template>
    <section class="my-lg-14 my-8">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-6">

                    <h3 class="mb-0">Popular Products</h3>

                </div>
            </div>

            <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">


                <div v-for="product in products" :key="product.slug" class="col">
                    <div class="card card-product">
                        <div class="card-body">

                            <div class="text-center position-relative ">
                                <div class=" position-absolute top-0 start-0">
                                    <span class="badge bg-danger">{{ product.tag ? product.tag : '' }}</span>
                                </div>
                                <a :href="route('product.view', [product.categorySlug, product.slug])"> <img
                                        :src="`images/products/${JSON.parse(product.image)}`"
                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>


                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="modal"
                                        data-bs-target="#productViewModal" data-id="{{ product.id }}"
                                        onclick="productId({{ product.id }})"><i class="bi bi-eye"
                                            data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                                    <a onclick="addProductWishList({{ product.id }})" class="btn-action"
                                        data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                                            class="bi bi-heart"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                        title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                </div>

                            </div>
                            <div class="text-small mb-1"><a :href="route('category.view', product.categorySlug)"
                                    class="text-decoration-none text-muted"><small>{{ product.categoryName
                                        }}</small></a>
                            </div>
                            <h2 class="fs-6"><a :href="route('product.view', [product.categorySlug, product.slug])"
                                    class="text-inherit text-decoration-none">{{ product.name }}</a></h2>
                            <div>

                                <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small> <span
                                    class="text-muted small">4.5(149)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">{{ product.sale_price }}</span> <span
                                        class="text-decoration-line-through text-muted">{{ product.price }}</span>
                                </div>
                                <div><a onclick="addProductCart({{ product.id }})" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> Add
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>