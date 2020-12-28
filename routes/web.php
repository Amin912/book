<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('layouts.app');
});

Route::get('/store', function () {
    return view('store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/first', function () {
    return view('first');
});

Route::get('/cart', function () {
    return view('user/cart');
});

Route::get('/book', function () {
    return view('/book');
});

Route::get('/add', function(){
    return view('admin/adminBook');
});

Route::resource('book', BooksController::class);

Route::get('/book/{id}', [BooksController::class, 'show']);