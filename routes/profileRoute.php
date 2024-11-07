<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Profile\UserProfileController;
use App\Http\Controllers\Profile\WishListController;
use Illuminate\Support\Facades\Route;

//views auth
Route::inertia('/register', 'Auth/Signup')->name('user.register');
Route::inertia('/reset-password', 'Auth/ResetPassword')->name('user.resetpwd');
Route::inertia('/login', 'Auth/Login')->name('user.login');

Route::post('/login', [UserAuthController::class, 'login'])->name('user.login.post');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.post');
Route::post('/reset-password', [UserAuthController::class, 'resetPassword'])->name('user.resetpwd.post');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['user.auth', 'check.auth']], function () {
    //views user account info
    Route::get('/profile', [UserProfileController::class, 'userOrders'])->name('profile');
    Route::get('/profile/setting', [UserProfileController::class, 'userInfo'])->name('profile.setting');
    Route::get('/profile/address', [UserProfileController::class, 'userAddress'])->name('profile.address');
    Route::get('/wish-list', [WishListController::class, 'wishList'])->name('profile.wish-list');

    Route::post('/profile/setting', [UserProfileController::class, 'updateProfileInfo'])->name('profile.info.update');
    Route::post('/profile/setting/password-update', [UserProfileController::class, 'updateProfilePasswd'])->name('profile.passwd.update');
    Route::post('/profile/setting/account-delete', [UserProfileController::class, 'profileDelete'])->name('profile.delete');

    //api actions cart
    Route::get('/profile/cart/info', [CartController::class, 'cartInfo'])->name('cart.info');
    Route::post('/profile/cart/add', [CartController::class, 'addCart'])->name('add.cart');
    Route::post('/profile/cart/delete', [CartController::class, 'deleteCartItem'])->name('delete.cart');

    Route::post('/wish-list/product/add', [WishListController::class, 'addWishList'])->name('add.wish-list');
    Route::post('/wish-list/product/remove', [WishListController::class, 'removeWishListItem'])->name('remove.wish-list.item');

    Route::inertia('/order/checkout', 'Frontend/Checkout')->name('checkoutPage');
});
