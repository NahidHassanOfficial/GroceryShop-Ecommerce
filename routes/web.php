<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Profile\InvoiceController;
use Illuminate\Support\Facades\Route;

require base_path('routes/adminRoute.php');
require base_path('routes/profileRoute.php');

Route::get('/category-list', [IndexController::class, 'categoryList'])->name('category.list');
Route::post('/search', [IndexController::class, 'search'])->name('search');

//views general
Route::group(['middleware' => ['check.auth']], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/category/{categorySlug}', [CategoryController::class, 'categoryView'])->name('category.view');
    Route::get('/{categorySlug}/product/{productSlug}', [ProductController::class, 'productView'])->name('product.view');

    Route::inertia('/cart', 'Frontend/ConfirmCart')->name('cartPage');
});

//payment gateway routes | SSLCOMMERZ
Route::get('/create', [InvoiceController::class, 'createInvoice']);
Route::post("/payment/success", [InvoiceController::class, 'paymentSuccess']);
Route::post("/payment/failed", [InvoiceController::class, 'paymentCancel']);
Route::post("/payment/canceled", [InvoiceController::class, 'paymentFail']);
Route::post("/payment/ipn", [InvoiceController::class, 'paymentIPN']);
