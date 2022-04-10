<?php

use App\Http\Controllers\Admin\AdminDashboardController as AdminDashboard;
use App\Http\Controllers\User\DashboardUserController as UserDashboard;
use App\Http\Controllers\Admin\PengelolaanProdukPemilahController as PengelolaanProduk;
use App\Http\Controllers\Admin\PengelolaanSampahController as PengelolaanSampah;
use App\Http\Controllers\Auth\LoginController as Login;
use App\Http\Controllers\Auth\LogoutController as Logout;
use App\Http\Controllers\Auth\RegisterController as Register;
use App\Http\Controllers\Penukaran\SampahController as Sampah;
use App\Http\Controllers\Penukaran\ProdukController as Produk;
use App\Http\Controllers\HomeController as Home;
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
Route::get('/', [Home::class, 'index']);
Route::get('/penukaran-sampah',[Sampah::class, 'index'])->name('penukaran-sampah');
Route::post('/penukaran-sampah',[Sampah::class, 'store'])->name('penukaran-sampah');

Route::get('penukaran-produk', [Produk::class, 'index'])->name('penukaran-produk');

// only guest for access
Route::middleware('guest')->group(function() {
    //register & login
    Route::get('register', [Register::class, 'index'])->name('register');
    Route::post('register', [Register::class, 'store'])->name('register');
    Route::get('login', [Login::class, 'index'])->name('login');
    Route::post('login', [Login::class, 'authenticate'])->name('login');
});

// only users logged in
Route::middleware('auth')->group(function() {
    // admin
    Route::prefix('admin')->middleware('ensureRole:admin')->group(function() {
        Route::get('/', [AdminDashboard::class, 'index'])->name('admin.dashboard');
        
        Route::get('data-produk-pemilahan', [PengelolaanProduk::class, 'index'])->name('admin.data-produk-pemilahan');
    
        Route::get('data-penukaran-sampah', [PengelolaanSampah::class, 'index'])->name('admin.data-penukaran-sampah');
    });

    Route::prefix('user')->middleware('ensureRole:user')->group(function() {
        
        Route::get('/', [UserDashboard::class, 'index'])->name('user.dashboard-user');
    });

    // logout
    Route::post('logout', Logout::class)->name('logout');
});
