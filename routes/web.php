<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');

    Route::get('/laporan/export/excel', [LaporanController::class, 'exportExcel'])
        ->name('laporan.export.excel');

    Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPdf'])
        ->name('laporan.export.pdf');

    Route::get('/buku/export/excel', [BukuController::class, 'exportExcel'])
        ->name('buku.export.excel');

    Route::get('/buku/export/pdf', [BukuController::class, 'exportPdf'])
        ->name('buku.export.pdf');

    Route::get('/anggota/export/excel', [AnggotaController::class, 'exportExcel'])
        ->name('anggota.export.excel');

    Route::get('/anggota/export/pdf', [AnggotaController::class, 'exportPdf'])
        ->name('anggota.export.pdf');

    Route::get('/buku/{id}/qrcode', [BukuController::class, 'qrcode'])
        ->name('buku.qrcode');

    Route::get('/buku/{id}/barcode', [BukuController::class, 'barcode'])
        ->name('buku.barcode');

    Route::get('/buku/{id}/label', [BukuController::class, 'label'])
        ->name('buku.label');
    
    Route::get('/profil', [ProfileController::class,'index'])
        ->name('profil');

    Route::post('/profil', [ProfileController::class,'update'])
        ->name('profil.update');

    Route::get('/ganti-password', [ProfileController::class, 'password'])
    ->name('password');

    Route::post('/ganti-password', [ProfileController::class, 'updatePassword'])
        ->name('password.update');

    Route::resource('buku', BukuController::class);

    Route::resource('anggota', AnggotaController::class);

    Route::resource('peminjaman', PeminjamanController::class);

});