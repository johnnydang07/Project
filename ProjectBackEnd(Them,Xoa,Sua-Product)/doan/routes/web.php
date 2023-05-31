<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/users', function () {
    return view('show');
});
Route::get('users', [UserController::class, 'index'])->name('users');
Route::post('custom-login', [UserController::class, 'postLogin'])->name('login.custom');
Route::post('products/{id}', 'CommentController@store');
Route::resource('carts', CartController::class);
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('comments', CommentController::class);
Route::resource('users', UserController::class);
Route::resource('admins', AdminController::class);
Route::resource('replies', ReplyController::class);