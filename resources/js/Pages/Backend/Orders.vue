<script setup>
import MasterBackend from './Layout/MasterBackend.vue';
import Pagination from './Components/Pagination.vue';
defineOptions({
    layout: MasterBackend
})

const props = defineProps({
    orders: Array
})
</script>
<template>
    <!-- main wrapper -->
    <main class="main-content-wrapper">
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <!-- page header -->
                    <div>
                        <h2>Order List</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="p-6">
                            <div class="row justify-content-between">
                                <div class="col-md-4 col-12 mb-2 mb-md-0">
                                    <!-- form -->
                                    <form class="d-flex" role="search">
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search" />
                                    </form>
                                </div>
                                <div class="col-lg-2 col-md-4 col-12">
                                    <!-- select -->
                                    <select class="form-select">
                                        <option selected>Status</option>
                                        <option value="Success">Success</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Cancel">Cancel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table responsive -->
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkAll" />
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Image</th>
                                            <th>Invoice</th>
                                            <th>Customer</th>
                                            <th>Date & TIme</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="order in orders.data" :key="order.id">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="orderOne" />
                                                    <label class="form-check-label" for="orderOne"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#"><img :src="'/images/products/product-img-1.jpg'" alt=""
                                                        class="icon-shape icon-md" /></a>
                                            </td>
                                            <td><a :href="route('dash.orders.single', 'FC#1007')"
                                                    class="text-reset">FC#1007</a></td>
                                            <td>Jennifer Sullivan</td>

                                            <td>01 May 2023 (10:12 am)</td>
                                            <td>Paypal</td>

                                            <td>
                                                <span class="badge bg-light-primary text-dark-primary">Success</span>
                                            </td>
                                            <td>$12.99</td>

                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="bi bi-trash me-3"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="bi bi-pencil-square me-3"></i>
                                                                Edit
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <Pagination :paginator="orders" :scrollPreserve="false" />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>