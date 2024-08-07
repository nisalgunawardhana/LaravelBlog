<?php

use Illuminate\Support\Facades\Route;





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('tutorial/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('tutorial/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);

//commet sys

Route::post('comment', [App\Http\Controllers\Frontend\CommentController::class, 'comment']);
Route::post('comment-delete', [App\Http\Controllers\Frontend\CommentController::class, 'commentDelete']);

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.login');
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('/update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('/delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::get('/add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('/add-post', [App\Http\Controllers\Admin\PostController::class, 'store']);
    Route::get('/edit-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
    Route::put('/update-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'update']);
    Route::get('/delete-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);

    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('/edit-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('/update-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
    
});
