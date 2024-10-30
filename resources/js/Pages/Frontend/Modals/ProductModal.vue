<template>
    <!-- Modal -->
    <div class="modal fade" id="productViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-8">
                    <div class="position-absolute top-0 end-0 me-3 mt-3">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row" id="productData">

                        <div class="col-lg-6">
                            <!-- img slide -->
                            <div class="product productModal" id="productModal">
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="background-image: url(./images/products/product-single-img-1.jpg)">
                                        <!-- img -->
                                        <img :src="'./images/products/product-single-img-1.jpg'" alt="" />
                                    </div>
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="background-image: url(./images/products/product-single-img-2.jpg)">
                                        <!-- img -->
                                        <img :src="'./images/products/product-single-img-2.jpg'" alt="" />
                                    </div>
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="background-image: url(./images/products/product-single-img-3.jpg)">
                                        <!-- img -->
                                        <img :src="'./images/products/product-single-img-3.jpg'" alt="" />
                                    </div>
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="background-image: url(./images/products/product-single-img-4.jpg)">
                                        <!-- img -->
                                        <img :src="'./images/products/product-single-img-4.jpg'" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- product tools -->
                            <div class="product-tools">
                                <div class="thumbnails row g-3" id="productModalThumbnails">
                                    <div class="col-3 tns-nav-active">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img :src="'./images/products/product-single-img-1.jpg'" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img :src="'./images/products/product-single-img-2.jpg'" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img :src="'./images/products/product-single-img-3.jpg'" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img :src="'./images/products/product-single-img-4.jpg'" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ps-lg-8 mt-6 mt-lg-0">
                                <a href="#!" class="mb-4 d-block" id="categoryTitle">Bakery Biscuits</a>
                                <h2 class="mb-1 h1" id="productTitle">${product.name }
                                </h2>
                                <div class="mb-4">
                                    <small class="text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </small>
                                    <a href="#" class="ms-2">(30 reviews)</a>
                                </div>
                                <div class="fs-4">
                                    <span class="fw-bold text-dark" id="salePrice">$32</span>
                                    <span class="text-decoration-line-through text-muted" id="price">$35</span>
                                    <span><small class="fs-6 ms-2 text-danger">26%
                                            Off</small></span>
                                </div>
                                <hr class="my-6" />
                                <div class="mb-4">
                                    <button type="button" class="btn btn-outline-secondary">250g</button>
                                    <button type="button" class="btn btn-outline-secondary">500g</button>
                                    <button type="button" class="btn btn-outline-secondary">1kg</button>
                                </div>
                                <div>
                                    <!-- input -->
                                    <!-- input -->
                                    <div class="input-group input-spinner">
                                        <input type="button" value="-" class="button-minus btn btn-sm"
                                            data-field="quantity" />
                                        <input id="quantity" type="number" step="1" max="10" value="1" name="quantity"
                                            class="quantity-field form-control-sm form-input" />
                                        <input type="button" value="+" class="button-plus btn btn-sm"
                                            data-field="quantity" />
                                    </div>
                                </div>
                                <div class="mt-3 row justify-content-start g-2 align-items-center">
                                    <div class="col-lg-4 col-md-5 col-6 d-grid">
                                        <!-- button -->
                                        <!-- btn -->
                                        <button type="button" class="btn btn-primary" onclick="addProductCart()">
                                            <i class="feather-icon icon-shopping-bag me-2"></i>
                                            Add to cart
                                        </button>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <!-- btn -->
                                        <!-- <a class="btn btn-light" href="#" data-bs-toggle="tooltip"
                                        data-bs-html="true" aria-label="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a> -->
                                        <a class="btn btn-light" href="#!" data-bs-toggle="tooltip" data-bs-html="true"
                                            aria-label="Wishlist" onclick="addProductWishList()"><i
                                                class="feather-icon icon-heart"></i></a>
                                    </div>
                                </div>
                                <hr class="my-6" />
                                <div>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Product Code:</td>
                                                <td>FBB00255</td>
                                            </tr>
                                            <tr>
                                                <td>Availability:</td>
                                                <td>In Stock</td>
                                            </tr>
                                            <tr>
                                                <td>Type:</td>
                                                <td>Fruits</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>
                                                    <small>
                                                        01 day shipping.
                                                        <span class="text-muted">( Free
                                                            pickup today)</span>
                                                    </small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
// Event listener for when the modal is about to be shown
$('#productViewModal').on('show.bs.modal', function (event) {
    // `event.relatedTarget` is the element that triggered the modal
    let button = $(event.relatedTarget);
    let productID = button.data('id'); // Get the product ID from `data-id`
    console.log(productID)

    async function addProductCart() {
        let response = await axios.post(route('add.cart'), {
            productID,
            'quantity': document.getElementById('quantity').value,
        })
        if (response.data.status === 'success') {
            successToast('Added to cart')
        }
    }
});

async function productId(id) {
    let response = await axios.get(`api/product/${id}`);
    let product = response.data

    document.getElementById('productTitle').innerText = product.name;
    document.getElementById('salePrice').innerText = `$${product.sale_price}`;
    document.getElementById('price').innerText = `$${product.price}`;
    // document.getElementById('.product-description').innerText = product.description;
    // document.getElementById('.product-availability').innerText = product.stock ? "In Stock" :
    "Out of Stock";
    // Update images dynamically
    // document.getElementById('productModal').innerHTML = product.image.map(image => `
    //     <div class="zoom" onmousemove="zoom(event)" style="background-image: url(${image})">
    //         <img src="${image}" alt="${product.name}" />
    //     </div>
    // `).join('');

    new bootstrap.Modal(document.getElementById('productViewModal')).show();


}



async function addProductWishList() {
    let response = await axios.post(route('add.wish-list'), {
        productID: productID
    })
    if (response.data['status'] === 'success') {
        successToast('Added to Wish List')
    }
}
</script>
