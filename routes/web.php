<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;

Route::get('/', [ProductController::class, 'publicMenu'])->name('menu.public');

Route::get('/admin', [SettingController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [SettingController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [SettingController::class, 'logout'])->name('admin.logout');

Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', [ProductController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/admin/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/admin/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/admin/settings', [SettingController::class, 'update'])->name('settings.update');
});