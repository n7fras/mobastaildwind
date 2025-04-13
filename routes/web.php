<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InternalUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\BerandaController;
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

// Authentication Routes
Route::get('/login_mobas', [LoginController::class, 'login'])->name('login'); 
Route::post('/login', [LoginController::class, 'authLogin'])->name('authLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Change Password Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/change-password', [InternalUserController::class, 'changePasswordForm'])->name('change-password.form');
    Route::post('/change-password', [InternalUserController::class, 'updatePassword'])->name('change-password.update');
});


//frontend

// Frontend 
Route::get('/', [BerandaController::class, 'index'])->name('beranda'); 
Route::get('frontend/product/detail/{id}', [ProductController::class, 'detail_product'])->name('product.detail_product');


// Middleware Group for Authenticated Users
Route::middleware(['auth', 'check.status'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Internal User Routes
    Route::get('/internal_user', [InternalUserController::class, 'index'])->name('internal_user.index');
    Route::get('/internal_user/create', [InternalUserController::class, 'create'])->name('internal_user.create');
    Route::post('/internal_user/post', [InternalUserController::class, 'store'])->name('internal_user.store');
    Route::delete('/internal_user/delete/{id}', [InternalUserController::class, 'destroy'])->name('internal_user.delete');
    Route::post('/internal_user/update/{id}', [InternalUserController::class, 'update'])->name('internal_user.update');
    Route::get('/internal_user/edit/{id}', [InternalUserController::class, 'edit'])->name('internal_user.edit');
    Route::get('/internal_user/deactivate/{id}', [InternalUserController::class, 'deactivate'])->name('internal_user.deactivate');
    Route::get('/internal_user/reactivate/{id}', [InternalUserController::class, 'reactivate'])->name('internal_user.reactivate');
    // Product Routes
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/addstock/{id}', [ProductController::class, 'addstock'])->name('product.addstock');
    Route::put('/product/updatestock/{id}', [ProductController::class, 'updatestock'])->name('product.updatestock');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
});

// Internal User Operations
Route::post('/internal_user/post', [InternalUserController::class, 'store'])->name('internal_user.store');
Route::post('/internal_user/{id}/deactivate', [InternalUserController::class, 'deactivate'])->name('internal_user.deactivate');
Route::post('/internal_user/{id}/reactivate', [InternalUserController::class, 'reactivate'])->name('internal_user.reactivate');
Route::get('/internal_user/search', [InternalUserController::class, 'search'])->name('internal_user.search');


// customer
route::get('/customer',[CustomerController::class,'index'])->name('customer.data');
route::get('/customer/activity_log',[CustomerController::class,'log'])->name('customer.log_activity');


// mechanic
route::get('/mechanic',[MechanicController::class,'index'])->name('mechanic.data');
route::get('/mechanic/activity_log',[MechanicController::class,'log'])->name('mechanic.log_activity');