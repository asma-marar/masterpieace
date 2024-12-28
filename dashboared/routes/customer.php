<?php

use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\Auth\UserHomeController;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\User\Auth\UserRegisterController;
use App\Http\Controllers\User\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\WishListController;

/*
|--------------------------------------------------------------------------
| customer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('user')->name('user.')->group(function(){

//to take me to a page called home when the user login
//midleware not any one can login should have auth
Route::middleware('auth:customer')->group(function(){
    Route::get('home', [UserHomeController::class , 'index'])->name('home');

    Route::get('products', [ProductController::class, 'index'])->name('products');

    Route::get('product-detail/{id}', [ProductController::class, 'detail'])->name('detail');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::get('/profile/add', [ProfileController::class, 'add'])->name('profile.add'); 
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store'); // For handling form submission


    Route::get('/wishlist', [WishListController::class, 'showWishlist'])->name('wishlist');
    Route::post('/wishlist/add', [WishListController::class, 'addToWishlist'])->name('wishlist.add');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('cart/delete/{id}', [CartController::class, 'deleteItem'])->name('cart.delete');
    Route::post('/cart/update-quantity', [CartController::class,'updateQuantity'])->name('cart.update.quantity');


    Route::get('/order/checkout', [OrderController::class, 'index'])->name('order.checkout');
    Route::post('/place-order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order-success', [OrderController::class, 'success'])->name('orders.success');
    Route::get('/order/show', [OrderController::class, 'orderHistory'])->name('orders.show');

    // Route::get('/profile/history', [ProfileController::class, 'order'])->name('profile.history'); 





});



//return the view of login
Route::get('login', [UserLoginController::class , 'login'])->name('login');

//wehn the user make submit on the login
Route::post('login', [UserLoginController::class , 'checkLogin'])->name('check');

//return the view of register
Route::get('register', [UserRegisterController::class , 'register'])->name('register');

//wehn the user make submit on the register
Route::post('register', [UserRegisterController::class , 'store'])->name('store');

Route::post('logout', [UserLoginController::class , 'logout'])->name('logout');
});

//to take me to a page called home when the user login
//midleware not any one can login should have auth
// Route::get('user/home', [UserHomeController::class , 'index'])->name('user.home')->middleware('auth:customer');

// //return the view of login
// Route::get('user/login', [UserLoginController::class , 'login'])->name('user.login');

// //wehn the user make submit on the login
// Route::post('user/login', [UserLoginController::class , 'checkLogin'])->name('user.check');

// //return the view of register
// Route::get('user/register', [UserRegisterController::class , 'register'])->name('user.register');

// //wehn the user make submit on the register
// Route::post('user/register', [UserRegisterController::class , 'store'])->name('user.store');


// Route::post('user/logout', [UserLoginController::class , 'logout'])->name('user.logout');

