<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

require base_path('routes/adminRoute.php');
require base_path('routes/profileRoute.php');

//views general
Route::group(['middleware' => ['check.auth']], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/category/{categorySlug}')->name('category.view');
    Route::get('/{categorySlug}/product/{productSlug}')->name('product.view');
});

//view error page
Route::fallback(function () {
    return view('404');
});
