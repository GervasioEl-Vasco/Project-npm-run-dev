<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\StatusPesananController;
use App\Http\Controllers\PengecekanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;
// Manajemen pengguna khusus admin
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // Hilangkan ->only(...) agar rute create & edit aktif secara otomatis
        Route::resource('users', UserManagementController::class);
    });
    // Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pesanan/{pesanan}/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pesanan/{pesanan}/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/{pembayaran}', [PembayaranController::class, 'show'])->name('pembayaran.show');
    Route::patch('/pembayaran/{pembayaran}/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');
    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    // Tracking
    Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking.index');
    Route::get('/tracking/{pesanan}', [TrackingController::class, 'show'])->name('tracking.show');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Layanan
    Route::resource('layanan', LayananController::class)->except(['show']);
    // Pesanan
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
    Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
    Route::get('/pesanan/{pesanan}', [PesananController::class, 'show'])->name('pesanan.show');
    Route::get('/pesanan/{pesanan}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::patch('/pesanan/{pesanan}', [PesananController::class, 'update'])->name('pesanan.update');
    Route::delete('/pesanan/{pesanan}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
    // Status Pesanan
    Route::get('/pesanan/{pesanan}/status', [StatusPesananController::class, 'edit'])->name('status.edit');
    Route::patch('/pesanan/{pesanan}/status', [StatusPesananController::class, 'update'])->name('status.update');
    // Pengecekan
    Route::get('/pesanan/{pesanan}/pengecekan', [PengecekanController::class, 'edit'])->name('pengecekan.edit');
    Route::patch('/pesanan/{pesanan}/pengecekan', [PengecekanController::class, 'update'])->name('pengecekan.update');
    // Riwayat Pesanan
    Route::get('/riwayat-pesanan', [OrderHistoryController::class, 'index'])->name('order_history.index');
    Route::get('/riwayat-pesanan/{pesanan}', [OrderHistoryController::class, 'show'])->name('order_history.show');  
}); 
