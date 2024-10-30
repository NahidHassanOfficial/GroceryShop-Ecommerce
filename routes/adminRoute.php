<?php

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

//auth
Route::inertia('/admin/login', 'Auth/AdminLogin')->name('admin.loginPage');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

//views admin account info
Route::inertia('/dashboard', 'Backend/Summary')->name('dashboard');
Route::get('/dashboard/categories', [AdminCategoryController::class, 'categoryPage'])->name('dash.categories');
Route::middleware([AdminAuthMiddleware::class])->group(function () {

    Route::view('/dashboard/category/new', 'components.back-end.add-category')->name('dash.category.add');
    Route::post('/dashboard/category/new', [AdminCategoryController::class, 'createCategory'])->name('dash.category.add');
    Route::get('/dashboard/category/edit/{id}', [AdminCategoryController::class, 'editCategoryPage'])->name('dash.category.editPage');
    Route::post('/dashboard/category/edit', [AdminCategoryController::class, 'editCategory'])->name('dash.category.edit');
    Route::get('/dashboard/category/delete/{id}', [AdminCategoryController::class, 'deleteCategory'])->name('dash.category.delete');

    Route::get('/dashboard/products', [AdminProductController::class, 'productsPage'])->name('dash.products');
    Route::get('/dashboard/product/new', [AdminProductController::class, 'productCreatePage'])->name('dash.product.add');
    Route::post('/dashboard/product/new', [AdminProductController::class, 'createProduct'])->name('dash.product.add');
    Route::get('/dashboard/product/edit/{id}', [AdminProductController::class, 'editProductPage'])->name('dash.product.editPage');
    Route::post('/dashboard/product/edit/{id}', [AdminProductController::class, 'editProduct'])->name('dash.product.edit');
    Route::get('/dashboard/product/delete/{id}', [AdminProductController::class, 'deleteProduct'])->name('dash.product.delete');

    Route::view('/dashboard/customers', 'components.back-end.customers')->name('dash.customers');
    Route::view('/dashboard/customers/edit', 'components.back-end.customers')->name('dash.customers.edit');

    Route::view('/dashboard/orders', 'components.back-end.orders')->name('dash.orders');
    Route::view('/dashboard/order/{orderId}', 'components.back-end.order-single')->name('dash.orders.single');

});
