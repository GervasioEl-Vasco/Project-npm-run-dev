<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\StatusPesananController;
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
    Route::resource('layanan', LayananController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

    // Manajemen pengguna khusus admin
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function() {
        Route::resource('users', UserManagementController::class);
    });

    // Pesanan
    Route::resource('pesanan', PesananController::class)->only(['index', 'create', 'store', 'show']);
    Route::get('/pesanan/{pesanan}/status', [StatusPesananController::class, 'edit'])->name('status.edit');
    Route::patch('/pesanan/{pesanan}/status', [StatusPesananController::class, 'update'])->name('status.update');

    // Riwayat pesanan
    Route::get('/riwayat-pesanan', [OrderHistoryController::class, 'index'])->name('riwayat-pesanan.index');
    Route::get('/riwayat-pesanan/{pesanan}', [OrderHistoryController::class, 'show'])->name('riwayat-pesanan.show');

// Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pesanan/{pesanan}/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pesanan/{pesanan}/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/{pembayaran}', [PembayaranController::class, 'show'])->name('pembayaran.show'); 
    Route::patch('/pembayaran/{pembayaran}/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');


    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});

require __DIR__.'/auth.php';
