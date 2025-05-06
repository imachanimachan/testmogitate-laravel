<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/search', [ProductController::class, 'search'])->name('search');
Route::get('/products/register', [ProductController::class, 'register']);
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('show');
Route::post('/products', [ProductController::class, 'create']);
Route::patch('/products/{productId}/update', [ProductController::class, 'update'])->name('update');
Route::delete('/products/{productId}/delete', [ProductController::class, 'destroy'])->name('delete');
