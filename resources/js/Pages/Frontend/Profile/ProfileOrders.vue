<script setup>
import { onMounted } from 'vue';
import MasterProfile from './Layout/MasterProfile.vue';
defineOptions({
    layout: MasterProfile,
})

//removes backdrop if login from loginmodal
onMounted(() => {
    const backdrop = document.querySelector('.modal-backdrop');
    if (backdrop) {
        backdrop.remove();
    }
})

defineProps({
    orders: Array,
})
</script>
<template>

    <div class="col-lg-9 col-md-8 col-12">
        <div class="py-6 p-md-6 p-lg-10">
            <!-- heading -->
            <h2 class="mb-6">Your Orders</h2>

            <div class="table-responsive-xxl border-0">
                <!-- Table -->
                <table class="table mb-0 text-nowrap table-centered">
                    <!-- Table Head -->
                    <thead class="bg-light">
                        <tr>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Status</th>
                            <th>Amount</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table body -->
                        <tr v-if="orders" v-for="order in orders" :key="order.id">
                            <td class="align-middle border-top-0 w-0">
                                <a href="#"><img
                                        :src="`images/products/${JSON.parse(order.invoice_orders[0].product.image)[0]}`"
                                        alt="Ecommerce" class="icon-shape icon-xl" /></a>
                            </td>
                            <td class="align-middle border-top-0">
                                <a href="#" class="fw-semibold text-inherit">
                                    <h6 class="mb-0">{{ order.invoice_orders[0].product.name + '...' }}</h6>
                                </a>
                                <span><small class="text-muted">400g</small></span>
                            </td>
                            <td class="align-middle border-top-0">
                                <a href="#" class="text-inherit">{{ order.id }}</a>
                            </td>
                            <td class="align-middle border-top-0">March 5, 2023</td>
                            <td class="align-middle border-top-0">1</td>
                            <td class="align-middle border-top-0">
                                <span class="badge bg-warning">Processing</span>
                            </td>
                            <td class="align-middle border-top-0">{{ order.total }}</td>
                            <td class="text-muted align-middle border-top-0">
                                <a href="#" class="text-inherit" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="View"><i class="feather-icon icon-eye"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>