<?php

use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\Auth\UserHomeController;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\User\Auth\UserRegisterController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RatingController;
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
Route::get('home', [UserHomeController::class , 'index'])->name('home');
Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('/about-us', [UserHomeController::class, 'about'])->name('about-us');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/wishlist', [WishListController::class, 'showWishlist'])->name('wishlist');
Route::get('/cart', [CartController::class, 'index'])->name('cart');




Route::prefix('user')->name('user.')->group(function(){

//to take me to a page called home when the user login
//midleware not any one can login should have auth
Route::middleware('auth:customer')->group(function(){
    Route::get('/home/search', [UserHomeController::class, 'index'])->name('home.search');



    Route::get('product-detail/{id}', [ProductController::class, 'detail'])->name('detail');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::get('/profile/add', [ProfileController::class, 'add'])->name('profile.add'); 
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store'); // For handling form submission
    
    Route::get('/profile/products', [ProfileController::class, 'products'])->name('profile.products');
    // Get product data for edit
    Route::get('/profile/products/{product}/edit', [ProfileController::class, 'editProduct'])->name('profile.products.edit');
   // Update product
    Route::put('/profile/products/{product}', [ProfileController::class, 'updateProduct'])->name('profile.products.update');

    Route::post('/wishlist/add', [WishListController::class, 'addToWishlist'])->name('wishlist.add');

    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('cart/delete/{id}', [CartController::class, 'deleteItem'])->name('cart.delete');
    Route::post('/cart/update-quantity', [CartController::class,'updateQuantity'])->name('cart.update.quantity');
    Route::get('/cart/check', [CartController::class, 'check'])->name('cart.check');

    Route::get('/order/checkout', [OrderController::class, 'index'])->name('order.checkout');
    Route::post('/place-order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order-success', [OrderController::class, 'success'])->name('orders.success');
    Route::get('/order/show', [OrderController::class, 'orderHistory'])->name('orders.show');
    

    // Route::get('/profile/history', [ProfileController::class, 'order'])->name('profile.history'); 

    Route::get('/customer/{id}/profile', [UserHomeController::class, 'showProfile'])->name('customer.profile');

    // Show the rating form
    Route::get('rating/create/{order_id}', [RatingController::class, 'create'])->name('rating.create');

    // Store the submitted rating
    Route::post('/rating/store', [RatingController::class, 'store'])->name('rating.store');

    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');




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


