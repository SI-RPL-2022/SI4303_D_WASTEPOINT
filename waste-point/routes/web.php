<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
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

// free access
Route::get('/', [HomeController::class, 'index']);

// only guest for access
Route::middleware('guest')->group(function() {
    //register & login
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register');
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login');
});

// only users logged in
Route::middleware('auth')->group(function() {
    // admin
    Route::get('admin', [AdminDashboardController::class, 'index'])->middleware('auth');
    
    // logout
    Route::post('logout', LogoutController::class)->name('logout');
});
