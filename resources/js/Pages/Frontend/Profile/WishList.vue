<script setup>
import MasterProfile from './Layout/MasterProfile.vue';
import { addToCart } from '../Components/Utils/CartWishManage';
defineOptions({
    layout: MasterProfile,
})
defineProps({
    products: String,
})
import { toast } from 'vue3-toastify';
import { useForm } from '@inertiajs/vue3';

function removeWishItem(wishItem_id) {
    loader.show();
    const form = useForm({ wishItem_id });

    form.post(route('remove.wish-list.item'), {
        preserveScroll: true,
        onSuccess: () => {
            toast.success("Item Removed");
        },
        onError: () => {
            toast.error(form.errors.message);
        },
        onFinish: () => {
            loader.hide();
        }
    });
}
</script>
<template>
    <div class="col-lg-9 col-md-8 col-12">
        <div class="py-6 p-md-6 p-lg-10">
            <div class="mb-8">
                <!-- heading -->
                <h2 class="mb-0">My Wishlist</h2>
                <p>There are {{ products.length }} products in this wishlist.</p>
            </div>
            <div>
                <!-- table -->
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <!-- form check -->
                                    <div class="form-check">
                                        <!-- input --><input class="form-check-input" type="checkbox" value=""
                                            id="chechboxOne">
                                        <!-- label --><label class="form-check-label" for="chechboxOne">

                                        </label>
                                    </div>
                                </th>
                                <th></th>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr v-for="wishItem in products" :key="wishItem.id">

                                <td class="align-middle">
                                    <!-- form check -->
                                    <div class="form-check">
                                        <!-- input --><input class="form-check-input" type="checkbox" value=""
                                            id="chechboxTwo">
                                        <!-- label --><label class="form-check-label" for="chechboxTwo">

                                        </label>
                                    </div>

                                </td>
                                <td class="align-middle">

                                    <a
                                        :href="route('product.view', [wishItem.product.category.slug, wishItem.product.slug])">
                                        <img :src="`images/products/${JSON.parse(wishItem.product.image)}`"
                                            alt="Grocery Ecommerce Template" class="img-fluid icon-shape icon-xxl">
                                    </a>


                                </td>
                                <td class=" align-middle">
                                    <div>
                                        <h5 class="fs-6 mb-0"><a
                                                :href="route('product.view', [wishItem.product.category.slug, wishItem.product.slug])"
                                                class="text-inherit">{{ wishItem.product.name }}</a>
                                        </h5>
                                        <small>$.98 / lb</small>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    {{ wishItem.product.sale_price ? wishItem.product.sale_price :
                                        wishItem.product.price }}
                                </td>
                                <template v-if="wishItem.product.stock && wishItem.product.status">
                                    <td class="align-middle"><span class="badge bg-success ">in
                                            stock</span>
                                    </td>
                                    <td class="align-middle">
                                        <button @click="addToCart(wishItem.product)" class="btn btn-primary btn-sm">
                                            Add to Cart
                                        </button>
                                    </td>
                                </template>
                                <template v-else>
                                    <td class="align-middle"><span class="badge bg-danger ">out of
                                            stock</span>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-info btn-sm">
                                            Contact Us </button>
                                    </td>
                                </template>

                                <td class="align-middle text-center" @click="removeWishItem(wishItem.id)">
                                    <a class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Delete">
                                        <i class="feather-icon icon-trash-2"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</template>