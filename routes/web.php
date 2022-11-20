<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/home', [ProductController::class, 'index'])->name('home');
Route::post('/home/add',[ProductController::class, 'addToCart']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/men', [ProductController::class, 'menProducts']);
Route::get('/women', [ProductController::class, 'womenProducts']);
Route::get('/products/{product}/show', [ProductController::class, 'show'])->name('showProduct');

// Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
//     Route::get('/admin', function () {
//         return view('admin');
//     });
// });

Route::get('/admin', function () {
    return view('admin');
})->middleware('auth', 'isAdmin');
