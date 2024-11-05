<script setup>
import MasterBackend from './Layout/MasterBackend.vue';
import Pagination from './Components/Pagination.vue';
defineOptions({
    layout: MasterBackend
})
const props = defineProps({
    products: Array,
})

//implemented search and status filter
import { computed, ref } from 'vue';
const search = ref('');
const selectedStatus = ref('');

const filteredProducts = computed(() => {
    let newProducts = props.products.data;

    if (search.value) {
        const searchText = search.value.toLowerCase();
        newProducts = newProducts.filter(product => {
            return product.name.toLowerCase().includes(searchText) ||
                product.category.name.toLowerCase().includes(searchText);
        });
    }

    if (selectedStatus.value != '') {
        newProducts = newProducts.filter(product => {
            return product.status == selectedStatus.value;
        });
    }

    return newProducts;
});

//product item delete function
import toast from 'vue3-toastify';
import { useForm } from '@inertiajs/vue3';
function deleteProduct(product_id) {
    useForm({}).get(route('dash.product.delete', product_id), {
        onSuccess: () => {
            toast.success('Product deleted successfully');
        },
        onError: () => {
            toast.error('Failed to delete product');
        }
    })
}
</script>
<template>
    <main class="main-content-wrapper">
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <!-- page header -->
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h2>Products</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <Link :href="route('dashboard')" class="text-inherit">Dashboard</Link>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a :href="route('dash.product.add')" class="btn btn-primary">Add Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="px-6 py-6">
                            <div class="row justify-content-between">
                                <!-- form -->
                                <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                                    <form class="d-flex" role="search">
                                        <input v-model="search" class="form-control" type="search"
                                            placeholder="Search Products" aria-label="Search" />
                                    </form>
                                </div>
                                <!-- select option -->
                                <div class="col-lg-2 col-md-4 col-12">
                                    <select v-model="selectedStatus" class="form-select">
                                        <option value="">Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table -->
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
                                            <th>Proudct Name</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Create at</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="product in filteredProducts" :key="product.id">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="productOne" />
                                                    <label class="form-check-label" for="productOne"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#"><img
                                                        :src="`/images/products/${JSON.parse(product.image)[0]}`" alt=""
                                                        class="icon-shape icon-md" /></a>
                                            </td>
                                            <td>
                                                <Link
                                                    :href="route('product.view', [product.category.slug, product.slug])"
                                                    class="text-reset">{{ product.name }}</Link>
                                            </td>
                                            <td>{{ product.category.name }}</td>

                                            <td>
                                                <span v-if="product.status"
                                                    class="badge bg-light-primary text-dark-primary">Published</span>
                                                <span v-else
                                                    class="badge bg-light-danger text-dark-danger">Unpublished</span>
                                            </td>
                                            <td>{{ product.price }}</td>
                                            <td>{{ new Date(product.updated_at).toLocaleString() }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" @click="deleteProduct(product.id)">
                                                                <i class="bi bi-trash me-3"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <Link class="dropdown-item"
                                                                :href="route('dash.product.edit', product.id)">
                                                            <i class="bi bi-pencil-square me-3"></i>
                                                            Edit
                                                            </Link>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <Pagination :paginator="products" :scrollPreserve="false" />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>