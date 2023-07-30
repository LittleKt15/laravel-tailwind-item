<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\backend\ItemController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index']);

Route::get('/selected-categories/{id}', [HomeController::class, 'selectedCategory']);

Route::get('/search-items/{id}', [HomeController::class, 'search']);

Route::get('/item-details/{id}', [HomeController::class, 'detail']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::put('/categories/{category}/update-status', [CategoryController::class, 'updateStatus'])->name('categories.update-status');

    Route::resource('/items', ItemController::class);
    Route::put('/items/{item}/update-status', [ItemController::class, 'updateStatus'])->name('items.update-status');
});
