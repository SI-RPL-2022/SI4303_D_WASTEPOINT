<?php
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\adminController;
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

Route::get('/', [HomeController::class, 'index']);

//login
route::get('/login', [loginController::class, 'index'])->middleware('guest');
route::post('/login', [loginController::class, 'authenticate']);
//register
route::get('/register', [registerController::class, 'index'])->middleware('guest');  
route::post('/register', [registerController::class, 'store']);
//logout
route::post('/logout', [loginController::class, 'logout']);
 //admin
route::get('/admin', [adminController::class, 'index'])->middleware('auth');
//logout
route::post('/logout', [loginController::class, 'logout']);