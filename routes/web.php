<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CatController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
//Route::get('/pagination/paginate-data', [CategoryController::class, 'pagination']);
Route::resource('task', TaskController::class);

Route::resource('cat', CatController::class);