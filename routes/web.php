<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
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
    return redirect('/home');
});

Route::get('/home', [AuthController::class, 'redirectLogged'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/auth', [AuthController::class, 'auth'])->name('auth');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('/signup', [AuthController::class, 'createUser'])->name('signup');
});

Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/admin_product', [AdminController::class, 'product'])->name('admin_product');
    Route::get('/admin_product_add', [AdminController::class, 'add_product'])->name('admin_product_add');
    Route::post('/admin_product_insert', [AdminController::class, 'product_insert'])->name('admin_product_insert');
    Route::get('/admin_product_delete/{id}', [AdminController::class, 'product_delete'])->name('admin_product_delete');
    Route::get('/admin_product_edit/{id}', [AdminController::class, 'product_edit'])->name('admin_product_edit');
    Route::post('/admin_product_update', [AdminController::class, 'product_update'])->name('admin_product_update');
    Route::get('/admin_order_list', [AdminController::class, 'order_list'])->name('admin_order_list');
    Route::get('/admin_order_history_list', [AdminController::class, 'order_history_list'])->name('admin_order_history_list');
    Route::get('/admin_order_detail/{id}',  [AdminController::class, 'order_detail'])->name('admin_order_detail');
    Route::get('/admin_order_cancel/{id}',  [AdminController::class, 'order_cancel'])->name('admin_order_cancel');
    Route::get('/admin_order_process/{id}',  [AdminController::class, 'order_process'])->name('admin_order_process');
    Route::get('/admin_order_ship/{id}',  [AdminController::class, 'order_ship'])->name('admin_order_ship');
    Route::get('/admin_order_finish/{id}',  [AdminController::class, 'order_finish'])->name('admin_order_finish');
    Route::get('/admin_profile',  [AdminController::class, 'profile'])->name('admin_profile');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/customer_dashboard',  [CustomerController::class, 'dashboard'])->name('customer_dashboard');
    Route::get('/customer_shop',  [CustomerController::class, 'shop'])->name('customer_shop');
    Route::get('/customer_profile',  [CustomerController::class, 'profile'])->name('customer_profile');
    Route::get('/customer_detail_product/{id}',  [CustomerController::class, 'detail_product'])->name('customer_detail_product');
    Route::get('/customer_cart_list',  [CustomerController::class, 'cart_list'])->name('customer_cart_list');
    Route::get('/customer_cart_add/{id}/{amount}',  [CustomerController::class, 'cart_add'])->name('customer_cart_add');
    Route::get('/customer_cart_delete/{id}',  [CustomerController::class, 'cart_delete'])->name('customer_cart_delete');
    Route::get('/customer_order_now/{id}/{amount}',  [CustomerController::class, 'order_now'])->name('customer_order_now');
    Route::get('/customer_order_cart',  [CustomerController::class, 'order_cart'])->name('customer_order_cart');
    Route::get('/customer_order_list',  [CustomerController::class, 'order_list'])->name('customer_order_list');
    Route::get('/customer_order_detail/{id}',  [CustomerController::class, 'order_detail'])->name('customer_order_detail');
    Route::get('/customer_order_cancel/{id}',  [CustomerController::class, 'order_cancel'])->name('customer_order_cancel');
    Route::post('/customer_order_payment',  [CustomerController::class, 'order_payment'])->name('customer_order_payment');
    Route::post('/customer_order_review',  [CustomerController::class, 'order_review'])->name('customer_order_review');
    Route::get('/customer_order_rating/{id}',  [CustomerController::class, 'order_rating'])->name('customer_order_rating');
    Route::post('/customer_checkout',  [CustomerController::class, 'checkout'])->name('customer_checkout');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/user_update_data', [AuthController::class, 'user_update_data'])->name('user_update_data'); 
});


