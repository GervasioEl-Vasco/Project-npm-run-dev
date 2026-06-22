<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\StatusPesananController;
use App\Http\Controllers\PengecekanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Layanan
    Route::resource('layanan', LayananController::class);

    // Pesanan
    Route::resource('pesanan', PesananController::class)->only(['index', 'create', 'store', 'show']);
    Route::patch('/pesanan/{pesanan}/status', [StatusPesananController::class, 'update'])->name('pesanan.status.update');

    // Pengecekan
    Route::post('/pesanan/{pesanan}/pengecekan', [PengecekanController::class, 'store'])->name('pengecekan.store');

    // Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pesanan/{pesanan}/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::patch('/pembayaran/{pembayaran}/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});

require __DIR__.'/auth.php';
