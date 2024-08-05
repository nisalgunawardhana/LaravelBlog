<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.login');
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('/update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('/delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    
});
