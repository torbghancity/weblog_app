<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class , 'index'])->name('weblog.index');

Route::get('/search', [HomeController::class , 'search'])->name('weblog.search');

Route::get('/{id}', [HomeController::class , 'show'])->name('weblog.show');

Route::get('/show/{id}', [HomeController::class , 'single'])->name('weblog.single');

Route::post('/show', [HomeController::class , 'store_comment'])->name('weblog.store_comment');

Route::scopeBindings()->group(function () {
   Route::get('/user/{user}', [UserController::class , 'index'])->name('user.index');
   Route::get('/user/{user}/posts/{post}', [UserController::class , 'show'])->name('user.show');
   
});