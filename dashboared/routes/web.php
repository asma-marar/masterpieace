<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\LandingPageController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [LandingPageController::class, 'index']);



// Route::get('/about-us', function () {
//     return view('front.about-us');
// });

Route::get('/contact', function () {
    return view('front.contact');
});

Route::get('/cart', function () {
    return view('front.cart');
});

// Route::get('/product-detail', function () {
//     return view('front.product-detail');
// });


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth' , 'isAdmin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'create']);
    Route::post('add-category', [CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [CategoryController::class, 'delete']);

    Route::get('user', [UserController::class ,'index']);
    Route::get('add-user', [UserController::class ,'create']);
    Route::post('add-user', [UserController::class ,'store']);
    Route::get('edit-user/{user_id}', [UserController::class ,'edit']);
    Route::put('update-user/{user_id}', [UserController::class ,'update']);
    Route::delete('delete-user/{user_id}', [UserController::class, 'delete']);

    Route::get('product', [ProductController::class ,'index']);
    Route::get('add-product', [ProductController::class ,'create']);
    Route::post('add-product', [ProductController::class ,'store']);
    Route::get('edit-product/{product_id}', [ProductController::class ,'edit']);
    Route::put('update-product/{product_id}', [ProductController::class, 'update']);
    Route::get('delete-product/{product_id}', [ProductController::class, 'delete']);

    Route::get('order', [OrderController::class, 'index']);
    Route::post('update-order-status/{order_id}', [OrderController::class, 'updateStatus']);
    Route::delete('delete-order/{order_id}', [OrderController::class, 'delete']);

    Route::get('contact', [ContactController::class, 'index']);
    Route::post('update-contact-status/{contact_id}', [ContactController::class, 'updateStatus']);
    Route::delete('delete-contact/{contact_id}', [ContactController::class, 'delete']);

    Route::get('orderproduct/{order_id}', [OrderController::class, 'view']);
    

});


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

