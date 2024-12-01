<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgentController;
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
    Route::get('/admin_product', [AdminController::class, 'admin_product'])->name('admin_product')->middleware('role:1');
    Route::get('/admin_add_product', [AdminController::class, 'admin_add_product'])->name('admin_add_product')->middleware('role:1');
});


Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/agent_dashboard',  [AgentController::class, 'dashboard'])->name('agent_dashboard')->middleware('role:2');
});



