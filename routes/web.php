<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InternalUserController;
use App\Http\Controllers\ProductController;
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
Route::get('/', [LoginController::class, 'login'])->name('login'); 
Route::post('/login', [LoginController::class, 'authLogin'])->name('authLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/addstock/{id}', [ProductController::class, 'addstock'])->name('product.addstock');
    Route::put('/product/updatestock/{id}', [ProductController::class, 'updatestock'])->name('product.updatestock');
});

// Internal User Operations
Route::post('/internal_user/post', [InternalUserController::class, 'store'])->name('internal_user.store');
Route::post('/internal_user/{id}/deactivate', [InternalUserController::class, 'deactivate'])->name('internal_user.deactivate');
Route::post('/internal_user/{id}/reactivate', [InternalUserController::class, 'reactivate'])->name('internal_user.reactivate');
Route::get('/internal_user/search', [InternalUserController::class, 'search'])->name('internal_user.search');
