<?php

use App\Http\Controllers\Admin\AdminDashboardController as AdminDashboard;
use App\Http\Controllers\Admin\PengelolaanPenukaranProdukController as PengelolaanPenukaranProduk;
use App\Http\Controllers\Admin\PengelolaanBlogController as PengelolaanBlog;
use App\Http\Controllers\User\DashboardUserController as UserDashboard;
use App\Http\Controllers\Admin\PengelolaanProdukPemilahController as PengelolaanProduk;
use App\Http\Controllers\Admin\PengelolaanSampahController as PengelolaanSampah;
use App\Http\Controllers\Auth\LoginController as Login;
use App\Http\Controllers\Auth\LogoutController as Logout;
use App\Http\Controllers\Auth\RegisterController as Register;
use App\Http\Controllers\Penukaran\SampahController as Sampah;
use App\Http\Controllers\Penukaran\ProdukController as Produk;
use App\Http\Controllers\Penukaran\KonversiPoinController as KonversiPoin;
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\User\UpdateProfilController as UpdateProfil;
use App\Http\Controllers\Blog\BlogController as Blog;
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
Route::get('/penukaran-sampah', [Sampah::class, 'index'])->name('penukaran-sampah');
Route::post('/penukaran-sampah', [Sampah::class, 'store'])->name('penukaran-sampah');

// penukaran produk
Route::get('penukaran-produk', [Produk::class, 'index'])->name('penukaran-produk');
Route::get('penukaran-produk/search', [Produk::class, 'search'])->name('penukaran-produk.search');
Route::get('penukaran-produk/{slug}', [Produk::class, 'detail']);
Route::post('penukaran-produk/{slug}', [Produk::class, 'store']);

// blog
Route::get('blog', [Blog::class, 'index'])->name('blog');
Route::get('blog/search', [Blog::class, 'search'])->name('blog.search');
Route::get('blog/{slug}', [Blog::class, 'read'])->name('blog.read');

// only guest for access
Route::middleware('guest')->group(function () {
    //register & login
    Route::get('register', [Register::class, 'index'])->name('register');
    Route::post('register', [Register::class, 'store'])->name('register');
    Route::get('login', [Login::class, 'index'])->name('login');
    Route::post('login', [Login::class, 'authenticate'])->name('login');
});

// only users logged in
Route::middleware('auth')->group(function () {
    // konversi poin
    Route::get('konversi-poin', [KonversiPoin::class, 'index'])->name('konversi-poin');
    Route::post('konversi-poin', [KonversiPoin::class, 'store']);
    Route::get('konversi-poin/success/{id}', [KonversiPoin::class, 'success']);

    // admin
    Route::prefix('admin')->middleware('ensureRole:admin')->group(function () {
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

        // pengelolaan data penukaran produk
        Route::get('data-penukaran-produk', [PengelolaanPenukaranProduk::class, 'index'])->name('admin.data-penukaran-produk');
        Route::get('data-penukaran-produk/detail/{id}', [PengelolaanPenukaranProduk::class, 'detail']);
        Route::post('data-penukaran-produk/detail/{id}', [PengelolaanPenukaranProduk::class, 'update']);
        Route::post('data-penukaran-produk/delete/{id}', [PengelolaanPenukaranProduk::class, 'delete']);

        // pengelolaan data blog
        Route::get('data-blog', [PengelolaanBlog::class, 'index'])->name('admin.data-blog');
        Route::get('data-blog/create', [PengelolaanBlog::class, 'create']);
        Route::post('data-blog/create', [PengelolaanBlog::class, 'store']);
        Route::get('data-blog/detail/{id}', [PengelolaanBlog::class, 'detail']);
        Route::post('data-blog/detail/{id}', [PengelolaanBlog::class, 'update']);
        Route::post('data-blog/delete/{id}', [PengelolaanBlog::class, 'delete']);

    });

    Route::prefix('user')->middleware('ensureRole:user')->group(function () {

        Route::get('/', [UserDashboard::class, 'index'])->name('user.dashboard-user');
        Route::get('penukaran-sampah/detail/{id}', [UserDashboard::class, 'sampah']);
        Route::get('penukaran-produk/detail/{id}', [UserDashboard::class, 'produk']);
        Route::post('penukaran-produk/detail/{id}', [UserDashboard::class, 'update']);
        Route::get('riwayat-konversi-poin', [UserDashboard::class, 'konversi_poin'])->name('riwayat-konversi-poin');
        Route::get('riwayat-konversi-poin/detail/{id}', [UserDashboard::class, 'detail_konversi_poin']);
        Route::get('edit-profil', [UpdateProfil::class, 'index'])->name('user.edit-profil');
        Route::post('edit-profil', [UpdateProfil::class, 'update'])->name('user.edit-profil');

        // rating
        Route::post('penukaran-sampah/detail/{id}/rating', [UserDashboard::class, 'waste_rating'])->name('waste_rating');
        Route::post('penukaran-produk/detail/{id}/rating', [UserDashboard::class, 'product_rating'])->name('product_exchange_rating');
    });

    // logout
    Route::post('logout', Logout::class)->name('logout');
});

// not found
Route::any(
    '{query}',
    function () {
        return view('not-found');
    }
)->where('query', '.*');
