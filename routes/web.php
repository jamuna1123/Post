<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PostCategoryController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('post/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/postcategory', [PostCategoryController::class, 'index'])->name('postcategory.index');
Route::get('/postcategory/create', [PostCategoryController::class, 'create'])->name('postcategory.create');
Route::post('/postcategory/store', [PostCategoryController::class, 'store'])->name('postcategory.store');
Route::get('postcategory/{id}/edit', [PostCategoryController::class, 'edit'])->name('postcategory.edit');
Route::put('postcategory/{id}', [PostCategoryController::class, 'update'])->name('postcategory.update');
Route::delete('/postcategory/{id}', [PostCategoryController::class, 'destroy'])->name('postcategory.destroy');
