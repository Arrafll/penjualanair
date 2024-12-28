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
    Route::get('/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard')->middleware('role:1');
    Route::get('/admin_product', [AdminController::class, 'product'])->name('admin_product')->middleware('role:1');
    Route::get('/admin_product_add', [AdminController::class, 'add_product'])->name('admin_product_add')->middleware('role:1');
    Route::post('/admin_product_insert', [AdminController::class, 'product_insert'])->name('admin_product_insert')->middleware('role:1');
    Route::get('/admin_product_delete/{id}', [AdminController::class, 'product_delete'])->name('admin_product_delete')->middleware('role:1');
    Route::get('/admin_product_edit/{id}', [AdminController::class, 'product_edit'])->name('admin_product_edit')->middleware('role:1');
    Route::post('/admin_product_update', [AdminController::class, 'product_update'])->name('admin_product_update')->middleware('role:1');
    Route::get('/admin_profile',  [AdminController::class, 'profile'])->name('admin_profile')->middleware('role:1');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/customer_dashboard',  [CustomerController::class, 'dashboard'])->name('customer_dashboard')->middleware('role:2');
    Route::get('/customer_profile',  [CustomerController::class, 'profile'])->name('customer_profile')->middleware('role:2');
    Route::get('/customer_detail_product/{id}',  [CustomerController::class, 'detail_product'])->name('customer_detail_product')->middleware('role:2');
    Route::get('/customer_cart_list',  [CustomerController::class, 'cart_list'])->name('customer_cart_list')->middleware('role:2');
    Route::get('/customer_cart_add/{id}',  [CustomerController::class, 'cart_add'])->name('customer_cart_add')->middleware('role:2');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/user_update_data', [AuthController::class, 'user_update_data'])->name('user_update_data'); 
});


