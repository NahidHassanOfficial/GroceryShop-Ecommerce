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
                            <th>Invoice ID</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Order Status</th>
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
                            <td class="align-middle border-top-0">{{ new
                                Date(order.created_at).toLocaleDateString('en-GB', {
                                    day: 'numeric', month: 'long',
                                    year: 'numeric'
                                }) }}
                            </td>
                            <td class="align-middle border-top-0">{{ order.invoice_orders.length }}</td>
                            <td class="align-middle border-top-0">
                                <span class="badge bg-warning" :class="{
                                    'bg-danger': order.order_status === 'canceled' || order.order_status === 'failed',
                                    'bg-info': order.order_status === 'shipped',
                                    'bg-success': order.order_status === 'delivered'
                                }"> {{ order.order_status }}</span>
                            </td>
                            <td class="align-middle border-top-0">{{ order.total }}</td>
                            <td class="text-muted align-middle border-top-0">
                                <a v-if="order.order_status != ('canceled' || 'failed')" href="#" class="text-inherit"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i
                                        class="feather-icon icon-eye text-success"></i></a>
                                <p v-else href="#" class="text-inherit" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="View"><i class="feather-icon icon-eye-off text-danger"></i></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>