<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Index
Route::get('/', function () {
    return view('main.pages.home');
});
Route::get('/home', function () {
    return view('main.pages.home');
});
Route::controller(MenuController::class)->group(function () {
    Route::get('/menu', 'indexMenu');
    Route::post('menu/{slug}/like', 'like')->name('food.like');
    Route::get('menu/{food:slug}/beli', 'tambahPesanan')->name('food.beli');
    Route::get('/pesanan', 'indexPesanan')->name('main.pages.pesanan');
    Route::get('/pesanan/{id}/tambah', 'tambah')->name('order.tambah');
    Route::get('/pesanan/{id}/kurang', 'kurang')->name('order.kurang');
    Route::get('/pesanan/checkout', 'checkout')->name('order.checkout');
});

// Login & Daftar
Route::controller(UserController::class)->group(function () {
    Route::get('daftar', 'indexDaftar');
    Route::post('daftar', 'daftarMain');
    Route::get('login', 'indexLogin')->middleware('guest')->name('login');
    Route::post('login', 'login');
});

// Dashboard
Route::middleware(['auth'])->group(function () {
    // 🔒 Admin Only
    Route::middleware(['role'])->prefix('dashboard')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/tag', 'tag');
        });

        Route::controller(CategoryController::class)->prefix('kategori')->group(function () {
            Route::get('/', 'index');
            Route::get('/tambah', 'indexTambah');
            Route::post('/tambah', 'tambahKategori');
            Route::get('/edit/{categories:name}', 'indexEdit');
            Route::post('/edit/{categories:name}', 'edit');
            Route::delete('/hapus', 'hapus');
        });

        Route::controller(TagController::class)->prefix('tag')->group(function () {
            Route::get('/', 'index');
            Route::get('/tambah', 'indexTambah');
            Route::post('/tambah', 'tambahTag');
            Route::get('/edit/{tag:name}', 'indexEdit');
            Route::post('/edit', 'edit');
            Route::delete('/hapus', 'hapus');
        });

        Route::controller(FoodController::class)->prefix('makanan')->group(function () {
            Route::get('/', 'index');
            Route::get('/tambah', 'indexTambah');
            Route::post('/tambah', 'tambahMakanan');
            Route::get('/{food:slug}', 'indexDetail');
            Route::get('/edit/{food:slug}', 'indexEdit');
            Route::post('/edit/{food:slug}', 'edit');
            Route::delete('/hapus', 'hapus');
        });

        Route::controller(UserController::class)->prefix('user')->group(function () {
            Route::get('/', 'index');
            Route::get('/tambah', 'indexTambah');
            Route::post('/tambah', 'tambahUser');
            Route::delete('/hapus', 'hapus');
            Route::get('/{user:username}', 'indexProfil');
            Route::post('/{user:username}', 'editProfil');
        });
    });

    // 🔓 All Roles (User & Admin)
    Route::prefix('dashboard')->group(function () {
        Route::get('/profil', [DashboardController::class, 'profil']);
        Route::post('/profil/edit', [UserController::class, 'edit']);

        Route::controller(OrderController::class)->group(function () {
            Route::get('/pesanan', 'index');
        });

        Route::post('/logout', [UserController::class, 'logout']);
    });
});
