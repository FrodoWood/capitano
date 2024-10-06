<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/home', [ProductController::class, 'index'])->name('home');
Route::post('/home/add', [ProductController::class, 'addToCart']);
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/delete', [CartController::class, 'updateCart']);
Route::get('cart/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/home', [CartController::class, 'placeOrder'])->name('placeOrder')->middleware('auth');
Route::post('/cancelOrder', [CartController::class, 'cancelOrder'])->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::get('/searchProduct', [ProductController::class, 'searchProduct'])->name('searchProduct');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/men', [ProductController::class, 'menProducts']);
Route::get('/women', [ProductController::class, 'womenProducts']);
Route::get('/products/{product}/show', [ProductController::class, 'show'])->name('showProduct');


//Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth', 'isAdmin')->name('admin');
Route::get('/admin/products', [AdminController::class, 'getProducts'])->middleware('auth', 'isAdmin')->name('adminProducts');
Route::get('/admin/products/categories', [AdminController::class, 'getProductCategories'])->middleware('auth', 'isAdmin')->name('adminProductCategories');
