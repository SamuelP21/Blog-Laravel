<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->controller(CategoryController::class)->group(function () {
    Route::get('/dashboard/category', 'index')->name('admin.category.index');
    Route::get('/dashboard/category/create', 'create')->name('admin.category.create');
    Route::post('/dashboard/category/create', 'store')->name('admin.category.store');
    Route::get('/dashboard/category/{category}/edit', 'edit')->name('admin.category.edit');
    Route::put('/dashboard/category/{category}', 'update')->name('admin.category.update');
    Route::delete('/dashboard/category/{category}', 'destroy')->name('admin.category.destroy');
});
/* posts */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->controller(PostController::class)->group(function () {
    Route::get('/dashboard/post', 'index')->name('admin.post.index');
    Route::get('/dashboard/post/create', 'create')->name('admin.post.create');
    Route::post('/dashboard/post/create', 'store')->name('admin.post.store');
    Route::get('/dashboard/post/{post}/edit', 'edit')->name('admin.post.edit');
    Route::put('/dashboard/post/{post}', 'update')->name('admin.post.update');
    Route::delete('/dashboard/post/{post}', 'destroy')->name('admin.post.destroy');
});

