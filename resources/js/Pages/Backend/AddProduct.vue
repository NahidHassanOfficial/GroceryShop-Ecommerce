<script setup>
import { onMounted, reactive, ref, watch } from 'vue';
import MasterBackend from './Layout/MasterBackend.vue';
import { useForm } from '@inertiajs/vue3';
defineOptions({
    layout: MasterBackend
})
const props = defineProps({
    categories: Array
});

const createProductForm = useForm({
    name: null,
    category_id: "",
    weight: null,
    sizes: null,
    colors: null,
    description: null,
    price: null,
    sale_price: null,
    product_code: null,
    product_sku: null,
    tag: "",
    stock: null,
    status: true,
    slug: null,
    meta_title: null,
    meta_description: null,
    images: [],
});

import { toast } from 'vue3-toastify';
const submit = () => {
    createProductForm.post(route('dash.product.add'), {
        forceFormData: true,
        onSuccess: () => {
            toast.success('Product Updated');
            createProductForm.reset();
            sizes.value = [];
            colors.value = [];
            newImages.value = [];
            quill.root.innerHTML = '';

        },
        onError: () => {
            if (createProductForm.errors.message)
                toast.error(createProductForm.errors.message);
        },
    });
}

const colors = ref([]);
const sizes = ref([]);
//on changes updating the createProductForm with json conversion
watch(colors, (newColors) => {
    createProductForm.colors = JSON.stringify(newColors);
})
watch(sizes, (newSizes) => {
    createProductForm.sizes = JSON.stringify(newSizes);
})

//parsing image file names to display current images and handling new image input and previewing them based on condition
const newImages = ref([]);
function handleFileInput(event) {
    newImages.value = [];
    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
        const reader = new FileReader();
        reader.onload = () => {
            newImages.value.push(reader.result);
        };
        reader.readAsDataURL(files[i]);
    }
    //fills array with input images
    createProductForm.images = Array.from(event.target.files);
}

//initializing quill editor on mount
import Quill from 'quill';
let quill;
onMounted(() => {
    const editorElement = document.querySelector("#editor");
    if (editorElement) {
        quill = new Quill(editorElement, {
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    [{ font: [] }],
                    ["bold", "italic", "underline", "strike"],
                    [{ size: ["small", false, "large", "huge"] }],
                    [{ list: "ordered" }, { list: "bullet" }],
                    [{ color: [] }, { background: [] }, { align: [] }],
                    ["link", "image", "code-block", "video"]
                ]
            },
            theme: "snow"
        });
    }

    quill.on('text-change', () => {
        createProductForm.description = quill.root.innerHTML;
    });
});

</script>

<template>
    <main class="main-content-wrapper">
        <div class="container">
            <!-- Page Header -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h2>Add Product</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <Link :href="route('dashboard')" class="text-inherit">Dashboard</Link>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <Link :href="route('dash.products')" class="text-inherit">Products</Link>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <Link :href="route('dash.products')" class="btn btn-light">Back to Product</Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Form -->
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Product Information</h4>
                            <form @submit.prevent="submit">
                                <div class="row">
                                    <!-- Title -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="Product Name" name="name"
                                            v-model="createProductForm.name" />
                                        <div class="text-danger">{{ createProductForm.errors.name }}</div>

                                    </div>

                                    <!-- Category -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Product Category</label>
                                        <select v-model="createProductForm.category_id" class="form-select"
                                            name="category_id">
                                            <option value="">Product Category</option>
                                            <option v-for="category in categories" :key="category.id"
                                                :value="category.id">
                                                {{ category.name }}
                                            </option>
                                        </select>
                                        <div class="text-danger">{{ createProductForm.errors.category }}</div>

                                    </div>


                                    <!-- Weight -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Weight</label>
                                        <input type="text" class="form-control" placeholder="Weight" name="weight"
                                            v-model="createProductForm.weight" />
                                        <div class="text-danger">{{ createProductForm.errors.weight }}</div>

                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" placeholder="Slug" name="slug"
                                            v-model="createProductForm.slug" />
                                        <div class="text-danger">{{ createProductForm.errors.slug }}</div>

                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <label class="form-label">Status</label>
                                        <div class="form-check form-switch">
                                            <input v-model="createProductForm.status" class="form-check-input"
                                                type="checkbox" name="status" id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexCheckDefault">Active</label>
                                        </div>
                                    </div>
                                    <!-- Colors Checkbox -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Colors</label>
                                        <div class="form-check">
                                            <input v-model="colors" class="form-check-input" type="checkbox" value="red"
                                                id="colorRed">
                                            <label class="form-check-label" for="colorRed">Red</label>
                                        </div>
                                        <div class="form-check">
                                            <input v-model="colors" class="form-check-input" type="checkbox"
                                                value="blue" id="colorBlue">
                                            <label class="form-check-label" for="colorBlue">Blue</label>
                                        </div>
                                        <div class="form-check">
                                            <input v-model="colors" class="form-check-input" type="checkbox"
                                                value="green" id="colorGreen">
                                            <label class="form-check-label" for="colorGreen">Green</label>
                                        </div>
                                        <div class="text-danger">{{ createProductForm.errors.colors }}</div>
                                    </div>

                                    <!-- Size Checkbox -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Size</label>
                                        <div class="form-check">
                                            <input v-model="sizes" class="form-check-input" type="checkbox"
                                                name="size[]" value="small" id="sizeSmall">
                                            <label class="form-check-label" for="sizeSmall">Small</label>
                                        </div>
                                        <div class="form-check">
                                            <input v-model="sizes" class="form-check-input" type="checkbox"
                                                name="size[]" value="medium" id="sizeMedium">
                                            <label class="form-check-label" for="sizeMedium">Medium</label>
                                        </div>
                                        <div class="form-check">
                                            <input v-model="sizes" class="form-check-input" type="checkbox"
                                                name="size[]" value="large" id="sizeLarge">
                                            <label class="form-check-label" for="sizeLarge">Large</label>
                                        </div>
                                        <div class="text-danger">{{ createProductForm.errors.sizes }}</div>
                                    </div>


                                    <!-- Product Images -->
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <h4 class="mb-3 h5">Product Images</h4>
                                        <div class="d-flex gap-2" id="previewImg">
                                            <img v-for="(image, index) in newImages" :key="index" :src="image"
                                                class="w-25 h-25" />
                                        </div>
                                        <label for="attachment"
                                            class="form-label border border-2 rounded mt-3 p-3 text-center d-col"
                                            style="border-style: dashed!important;">
                                            <img :src="'/images/cloud-upload-svgrepo.svg'" class="w-25" alt="">
                                            <div>Attach Media</div>
                                        </label>
                                        <input @input="handleFileInput" type="file" accept="image/*" name="image[]"
                                            id="attachment" class="col-md-5 col-sm-10 d-none" multiple>
                                        <div class="text-danger">{{ ' need to fix' }}</div>


                                    </div>

                                    <!-- Product Descriptions -->
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <h4 class="mb-3 h5">Product Descriptions</h4>
                                        <div class="py-8" id="editor"></div>
                                        <div class="text-danger">{{ createProductForm.errors.description }}</div>

                                    </div>

                                    <!-- Product Price, Sale Price, Quantity, Code, SKU -->
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <div class="mb-3">
                                            <label class="form-label">Product Price</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Price"
                                                name="price" v-model="createProductForm.price" />
                                            <div class="text-danger">{{ createProductForm.errors.price }}</div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Sale Price</label>
                                            <input type="text" class="form-control" placeholder="Enter Sale Price"
                                                name="sale_price" v-model="createProductForm.sale_price" />
                                            <div class="text-danger">{{ createProductForm.errors.sale_price }}</div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product Stock</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Stock"
                                                name="stock" v-model="createProductForm.stock" />
                                            <div class="text-danger">{{ createProductForm.errors.stock }}</div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product Code</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Code"
                                                name="product_code" v-model="createProductForm.product_code" />
                                            <div class="text-danger">{{ createProductForm.errors.product_code }}</div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product SKU</label>
                                            <input type="text" class="form-control" placeholder="Enter Product SKU"
                                                name="product_sku" v-model="createProductForm.product_sku" />
                                            <div class="text-danger">{{ createProductForm.errors.product_sku }}</div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tag</label>
                                            <select v-model="createProductForm.tag" class="form-select" name="tag">
                                                <option value="">Select Tag</option>
                                                <option value="Hot">Hot</option>
                                                <option value="Sale">Sale</option>
                                            </select>
                                            <div class="text-danger">{{ createProductForm.errors.tag }}</div>

                                        </div>
                                    </div>

                                    <!-- Meta Data -->
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <h4 class="mb-4 h5">Meta Data</h4>
                                        <div class="mb-3">
                                            <label class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" placeholder="Enter Meta Title"
                                                name="meta_title" v-model="createProductForm.meta_title" />
                                            <div class="text-danger">{{ createProductForm.errors.meta_title }}</div>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Meta Description</label>
                                            <textarea v-model="createProductForm.meta_description" class="form-control"
                                                placeholder="Enter Meta Description" name="meta_description"></textarea>
                                            <div class="text-danger">{{ createProductForm.errors.meta_description }}
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mb-3 col-12">
                                        <button type="submit" class="btn btn-primary">Create Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>