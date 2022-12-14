<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class,'index']);
    Route::get('dashboard/tag', function () {
        return view('pages.tag', ['type_menu' => 'tag']);
    });
    Route::get('dashboard/profil', function () {
        return view('pages.profil', ['type_menu' => 'profil']);
    });
    Route::controller(OrderController::class)->group(function() {
        Route::get('dashboard/pesanan', 'index');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('dashboard/kategori', 'index');
        Route::get('dashboard/kategori/tambah', 'indexTambah');
        Route::post('dashboard/kategori/tambah', 'tambahKategori');
        Route::get('dashboard/kategori/edit/{categories:name}', 'indexEdit');
        Route::post('dashboard/kategori/edit/{categories:name}', 'edit');
        Route::delete('dashboard/kategori/hapus', 'hapus');
    });
    Route::controller(TagController::class)->group(function () {
        Route::get('dashboard/tag', 'index');
        Route::get('dashboard/tag/tambah', 'indexTambah');
        Route::post('dashboard/tag/tambah', 'tambahTag');
        Route::get('dashboard/tag/edit/{tag:name}', 'indexEdit');
        Route::post('dashboard/tag/edit', 'edit');
        Route::delete('dashboard/tag/hapus', 'hapus');
    });
    Route::controller(FoodController::class)->group(function () {
        Route::get('menu/{food:slug}/like', 'like');
        Route::get('dashboard/makanan', 'index');
        Route::get('dashboard/kategori/{category:name}', 'indexCategory');
        Route::get('dashboard/makanan/tambah', 'indexTambah');
        Route::post('dashboard/makanan/tambah', 'tambahMakanan');
        Route::get('dashboard/makanan/{food:slug}', 'indexDetail');
        Route::get('dashboard/makanan/edit/{food:slug}', 'indexEdit');
        Route::post('dashboard/makanan/edit/{food:slug}', 'edit');
        Route::post('dashboard/makanan/tambah', 'tambahMakanan');
        Route::delete('dashboard/makanan/hapus', 'hapus');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('dashboard/user', 'index');
        Route::get('dashboard/user/tambah', 'indexTambah');
        Route::post('dashboard/user/tambah', 'tambahUser');
        Route::get('dashboard/user', 'index');
        Route::delete('dashboard/user/hapus', 'hapus');
        Route::get('dashboard/user/{user:username}', 'indexProfil');
        Route::post('dashboard/user/{user:username}', 'editProfil');
        Route::post('dashboard/profil/edit', 'edit');
        Route::post('/logout', 'logout');
    });
});

// Index
Route::get('/', function () {
    return view('main.pages.home');
});
Route::get('/home', function () {
    return view('main.pages.home');
});
Route::controller(MenuController::class)->group(function () {
    Route::get('/menu', 'indexMenu');
    Route::get('menu/{food:slug}/beli', 'tambahPesanan');
    Route::get('/pesanan', 'indexPesanan')->name('main.pages.pesanan');
});

// Login & Daftar
Route::controller(UserController::class)->group(function () {
    Route::get('/daftar', 'indexDaftar');
    Route::post('/daftar', 'daftarMain');
    Route::get('/login', 'indexLogin')->middleware('guest');
    Route::post('/login', 'login');
});