<script setup>

</script>

<template>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <div class="text-start">
                <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <div class="alert alert-danger" role="alert">
                You’ve got FREE delivery. Start checkout now!
            </div>

            <div>
                <div class="py-3">
                    <ul class="list-group list-group-flush" id="productList">

                        <li class="list-group-item py-3 px-0 border-top">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <img :src="`images/products'/`" alt="Ecommerce" class="img-fluid">
                                </div>
                                <div class="col-5">
                                    <h6 class="mb-0">${product['product']['name']}</h6>
                                    <span><small class="text-muted">.98 / lb</small></span>
                                    <div class="mt-2 small">
                                        <button class="bg-none btn btn-sm text-danger">
                                            <span class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10" y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14" y2="17">
                                                    </line>
                                                </svg>
                                            </span>
                                            Remove
                                        </button>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group input-spinner  flex-nowrap justify-content-center  ">
                                        <input type="button" value="-"
                                            class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                                            data-field="quantity">
                                        <input type="number" step="1" max="10" value="${product['quantity']}"
                                            name="quantity"
                                            class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                                        <input type="button" value="+"
                                            class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                                            data-field="quantity">
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <span class="fw-bold">${product['product']['price']}</span>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="d-grid">

                    <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center"
                        type="submit">
                        Go to Checkout <span class="fw-bold" id="totalAmmount"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</template>