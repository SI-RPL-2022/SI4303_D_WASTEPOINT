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

// penukaran produk
Route::get('penukaran-produk', [Produk::class, 'index'])->name('penukaran-produk');
Route::get('penukaran-produk/search', [Produk::class, 'search'])->name('penukaran-produk.search');
Route::get('penukaran-produk/{slug}', [Produk::class, 'detail']);
Route::post('penukaran-produk/{slug}', [Produk::class, 'store']);

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
        
        // pengelolaan data produk
        Route::get('data-produk-pemilahan', [PengelolaanProduk::class, 'index'])->name('admin.data-produk-pemilahan');
        Route::get('data-produk-pemilahan/create', [PengelolaanProduk::class, 'create']);
        Route::post('data-produk-pemilahan/create', [PengelolaanProduk::class, 'store']);
        Route::get('data-produk-pemilahan/detail/{id}', [PengelolaanProduk::class, 'detail']);
        Route::post('data-produk-pemilahan/detail/{id}', [PengelolaanProduk::class, 'update']);
        Route::post('data-produk-pemilahan/delete/{id}', [PengelolaanProduk::class, 'delete']);
    
        // pengelolaan data penukaran sampah
        Route::get('data-penukaran-sampah', [PengelolaanSampah::class, 'index'])->name('admin.data-penukaran-sampah');
        Route::get('data-penukaran-sampah/detail/{id}', [PengelolaanSampah::class, 'detail']);
        Route::post('data-penukaran-sampah/detail/{id}', [PengelolaanSampah::class, 'update']);
        Route::post('data-penukaran-sampah/delete/{id}', [PengelolaanSampah::class, 'delete']);
    });

    Route::prefix('user')->middleware('ensureRole:user')->group(function() {
        
        Route::get('/', [UserDashboard::class, 'index'])->name('user.dashboard-user');
        Route::get('penukaran-sampah/detail/{id}', [UserDashboard::class, 'sampah']);
    });

    // logout
    Route::post('logout', Logout::class)->name('logout');
});
