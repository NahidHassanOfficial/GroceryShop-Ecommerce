<?php

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCustomerManageController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

//auth
Route::inertia('/admin/login', 'Auth/AdminLogin')->name('admin.loginPage');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

//views admin account info
Route::middleware([AdminAuthMiddleware::class])->group(function () {
    Route::inertia('/dashboard', 'Backend/Summary')->name('dashboard');

    //manage categories
    Route::get('/dashboard/categories', [AdminCategoryController::class, 'categoriesPage'])->name('dash.categories');
    Route::get('/dashboard/category/new', [AdminCategoryController::class, 'createCategoryPage'])->name('dash.category.add');
    Route::post('/dashboard/category/new', [AdminCategoryController::class, 'createCategory'])->name('dash.category.add');
    Route::get('/dashboard/category/edit/{id}', [AdminCategoryController::class, 'editCategoryPage'])->name('dash.category.editPage');
    Route::post('/dashboard/category/edit/{id}', [AdminCategoryController::class, 'editCategory'])->name('dash.category.edit');
    Route::get('/dashboard/category/delete/{id}', [AdminCategoryController::class, 'deleteCategory'])->name('dash.category.delete');

    //manage products
    Route::get('/dashboard/products', [AdminProductController::class, 'productsPage'])->name('dash.products');
    Route::get('/dashboard/product/new', [AdminProductController::class, 'productCreatePage'])->name('dash.product.add');
    Route::post('/dashboard/product/new', [AdminProductController::class, 'createProduct'])->name('dash.product.add');
    Route::get('/dashboard/product/edit/{id}', [AdminProductController::class, 'editProductPage'])->name('dash.product.editPage');
    Route::post('/dashboard/product/edit/{id}', [AdminProductController::class, 'editProduct'])->name('dash.product.edit');
    Route::get('/dashboard/product/delete/{id}', [AdminProductController::class, 'deleteProduct'])->name('dash.product.delete');

    //manage customers
    Route::get('/dashboard/customers', [AdminCustomerManageController::class, 'customersPage'])->name('dash.customers');
    Route::get('/dashboard/customers/edit/{id}', [AdminCustomerManageController::class, 'editCustomerPage'])->name('dash.customers.editPage');

    //manage orders
    Route::get('/dashboard/orders', [AdminOrdersController::class, 'ordersPage'])->name('dash.orders');
});
