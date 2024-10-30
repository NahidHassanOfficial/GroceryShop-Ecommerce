<script></script>
<template>
    <main class="main-content-wrapper">
        <div class="container">
            <!-- Page Header -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h2>Add New Product</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a :href="route('dashboard')"
                                            class="text-inherit">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a :href="route('dash.products')"
                                            class="text-inherit">Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a :href="zzz" class="btn btn-light">Back to Product</a>
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
                            <form enctype="multipart/form-data" method="POST" action="{{ route('dash.product.add') }}"
                                id="form">
                                @csrf
                                <div class="row">
                                    <!-- Title -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="Product Name" name="name"
                                            value="{{ old('name') }}" />
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Category -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Product Category</label>
                                        <select class="form-select" name="category_id">
                                            <option selected>Product Category</option>
                                            <!-- @foreach ($categories as $category)
                                            <option value="{{ $category.id }}" {{ old('category_id')==$category->id
                                                ? 'selected' : '' }}>
                                                {{ $category.name }}</option>
                                            @endforeach -->
                                        </select>
                                        @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- Weight -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Weight</label>
                                        <input type="text" class="form-control" placeholder="Weight" name="weight"
                                            value="{{ old('weight') }}" />
                                        @error('weight')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" placeholder="Weight" name="slug"
                                            value="{{ old('slug') }}" />
                                        @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <label class="form-label">Status</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status"
                                                id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexCheckDefault">Active</label>
                                        </div>
                                    </div>
                                    <!-- Colors Checkbox -->
                                    <!-- <div class="mb-3 col-lg-6">
                                        <label class="form-label">Colors</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="colors[]" value="Red"
                                                id="colorRed" {{ in_array('Red', old('colors', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="colorRed">Red</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="colors[]" value="Blue"
                                                id="colorBlue" {{ in_array('Blue', old('colors', [])) ? 'checked' : ''
                                                }}>
                                            <label class="form-check-label" for="colorBlue">Blue</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="colors[]"
                                                value="Green" id="colorGreen" {{ in_array('Green', old('colors', []))
                                                ? 'checked' : '' }}>
                                            <label class="form-check-label" for="colorGreen">Green</label>
                                        </div>
                                        @error('colors')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> -->

                                    <!-- Size Checkbox -->
                                    <!-- <div class="mb-3 col-lg-6">
                                        <label class="form-label">Size</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="size[]" value="Small"
                                                id="sizeSmall" {{ in_array('Small', old('size', [])) ? 'checked' : ''
                                                }}>
                                            <label class="form-check-label" for="sizeSmall">Small</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="size[]" value="Medium"
                                                id="sizeMedium" {{ in_array('Medium', old('size', [])) ? 'checked' : ''
                                                }}>
                                            <label class="form-check-label" for="sizeMedium">Medium</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="size[]" value="Large"
                                                id="sizeLarge" {{ in_array('Large', old('size', [])) ? 'checked' : ''
                                                }}>
                                            <label class="form-check-label" for="sizeLarge">Large</label>
                                        </div>
                                        @error('size')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> -->

                                    <!-- Product Images -->
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <h4 class="mb-3 h5">Product Images</h4>
                                        <div class="d-flex gap-2" id="previewImg"></div>
                                        <label for="attachment"
                                            class="form-label border border-1 rounded border-dashed mt-3 p-3 text-center d-col">
                                            <img :src="'images/cloud-upload-svgrepo.svg'" class="w-25" alt="">
                                            <div>Attach Media</div>
                                        </label>
                                        <input type="file" accept="image/*" name="image[]" id="attachment"
                                            class="col-md-5 col-sm-10 d-none" multiple>
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Product Descriptions -->
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <h4 class="mb-3 h5">Product Descriptions</h4>
                                        <div class="py-8" id="editor"></div>
                                        <textarea name="description" id="description"
                                            hidden>{{ old('description') }}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Product Price, Sale Price, Quantity, Code, SKU -->
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <div class="mb-3">
                                            <label class="form-label">Product Price</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Price"
                                                name="price" value="{{ old('price') }}" />
                                            @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Sale Price</label>
                                            <input type="text" class="form-control" placeholder="Enter Sale Price"
                                                name="sale_price" value="{{ old('sale_price') }}" />
                                            @error('sale_price')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product Stock</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Stock"
                                                name="stock" value="{{ old('stock') }}" />
                                            @error('stock')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product Code</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Code"
                                                name="product_code" value="{{ old('product_code') }}" />
                                            @error('product_code')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product SKU</label>
                                            <input type="text" class="form-control" placeholder="Enter Product SKU"
                                                name="product_sku" value="{{ old('product_sku') }}" />
                                            @error('product_sku')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label class="form-label">Tag</label>
                                            <select class="form-select" name="tag">
                                                <option value="" selected>Select Tag</option>
                                                <option value="Hot" {{ old('tag')=='Hot' ? 'selected' : '' }}>
                                                    Hot</option>
                                                <option value="Sale" {{ old('tag')=='Sale' ? 'selected' : '' }}>
                                                    Sale</option>
                                            </select>
                                            @error('tag')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div> -->
                                    </div>

                                    <!-- Meta Data -->
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <h4 class="mb-4 h5">Meta Data</h4>
                                        <div class="mb-3">
                                            <label class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" placeholder="Enter Meta Title"
                                                name="meta_title" value="{{ old('meta_title') }}" />
                                            @error('meta_title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Meta Description</label>
                                            <textarea class="form-control" placeholder="Enter Meta Description"
                                                name="meta_description">{{ old('meta_description') }}</textarea>
                                            @error('meta_description')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mb-3 col-12">
                                        <button type="submit" class="btn btn-primary">Add Product</button>
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