<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/index_kategori', [KategoriController::class, 'index']);
    Route::get('/create_kategori', [KategoriController::class, 'create']);
    Route::post('/index_kategori', [KategoriController::class, 'store']);
    Route::get('/edit_kategori/{id}', [KategoriController::class, 'edit']);
    Route::put('/index_kategori/{id}', [KategoriController::class, 'update']);
    Route::get('/delete_kategori/{id}', [KategoriController::class, 'destroy']);

    Route::get('/index_artikel', [ArtikelController::class, 'index']);
    Route::get('/create_artikel', [ArtikelController::class, 'create']);
    Route::post('/index_artikel', [ArtikelController::class, 'store']);
    Route::get('/edit_artikel/{id}', [ArtikelController::class, 'edit']);
    Route::put('/index_artikel/{id}', [ArtikelController::class, 'update']);
    Route::get('/delete_artikel/{id}', [ArtikelController::class, 'destroy']);

});

Route::middleware(['auth'])->group(function () {
    Route::get('/index_user', [UserController::class, 'index']);
    Route::get('/create_user', [UserController::class, 'create']);
    Route::post('/index_user', [UserController::class, 'store']);
    Route::get('/edit_user/{id}', [UserController::class, 'edit']);
    Route::put('/index_user/{id}', [UserController::class, 'update']);
    Route::get('/delete_user/{id}', [UserController::class, 'destroy']);

    Route::resource('dashboard_admin', DashboardAdminController::class);
    // Route::get('/dashboard_admin', [DashboardAdminController::class, 'index']);
});