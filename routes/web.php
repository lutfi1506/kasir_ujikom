<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::group(attributes: ['middleware' => 'auth'], routes: function (): void {
    Route::get('/', DashboardController::class);
    Route::get('/about', function () {
        return view("about.index");
    });
    Route::controller(PenjualanController::class)->group(function () {
        Route::get('/transaksi', 'index')->name('penjualan.index');
        Route::get('/transaksi/{penjualan}', 'create')->name('penjualan.create');
        Route::post('/transaksi/init', 'init')->name('penjualan.init');
        Route::post('/transaksi/{penjualan}', 'store')->name('penjualan.store');
        Route::put('/transaksi/pelanggan/{penjualan}', 'updatePelanggan')->name('penjualan.updatePelanggan');
        Route::put('/transaksi/{detail}', 'update')->name('penjualan.update');
        Route::delete('/transaksi/{detail}', 'destroy')->name('penjualan.destroy');
        Route::post('/transaksi/bayar/{penjualan}', 'bayar')->name('penjualan.bayar');
        Route::get('/transaksi/nota/{penjualan}', 'nota')->name('penjualan.nota');
    });
    Route::middleware(IsAdmin::class)->group(function (): void {
        Route::get('/produk/addstok', [ProdukController::class, 'addStok'])->name('addstok');
        Route::post('/produk/addstok', [ProdukController::class, 'updateStok'])->name('updatestok');
        Route::resource('/produk', ProdukController::class)->except('show');

        Route::resource('/petugas', UserController::class)->except('show');

        Route::resource('/pelanggan', PelangganController::class)->except('show');
    });


    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/laporan/print', [LaporanController::class, 'print'])->name('laporan.print');


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
});
