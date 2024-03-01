<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ShowBannerController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/show', [ShowBannerController::class, 'showAll'])->name('users.index');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::controller(BannerController::class)->group(function () {
        Route::get('/banners', 'index')->name('banners.index');
        Route::post('/banners/new', 'store');
        Route::post('/banners/{id}', 'edit')->name('banners.edit');
        Route::delete('/banners/{id}', 'delete')->name('banners.delete');
    })->middleware('auth');

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
