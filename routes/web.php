<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::prefix('admin')->middleware(['auth', 'role:Admin,Kepala Seksi,Kepala Lab'])->group(function () {
    Route::get('/', [MainController::class, 'beranda'])->name('beranda');
    Route::resource('perusahaan', PerusahaanController::class)->middleware('role:Admin,Kepala Seksi');

    
    Route::get('surat-perintah-pengujian', [MainController::class, 'suratPerintah'])->name('surat-perintah-pengujian');
    Route::put('upload/{id}', [MainController::class, 'upload'])->name('upload');
    Route::get('pengujiaan', [MainController::class, 'pengujiaan'])->name('pengujiaan')->middleware('role:Kepala Seksi,Kepala Lab');
    Route::put('update-pengujiaan/{id}', [MainController::class, 'updatePengujian'])->name('update-pengujiaan');
    Route::get('laporan-pengujian', [MainController::class, 'laporanPengujian'])->name('laporan-pengujian');
    Route::get('surat-pengantar-pengujian', [MainController::class, 'suratPengantar'])->name('surat-pengantar-pengujian');
    Route::resource('kelola-pengguna', UserController::class)->middleware('role:Kepala Seksi');

    Route::get('print-pdf/{type}/{id}', [MainController::class, 'printPDF'])->name('print-pdf');
    Route::get('print-pdf-unapproved/{type}/{id}/{filename}', [MainController::class, 'printPDFunapproved'])->name('print-pdf-unapproved');
});

require __DIR__.'/auth.php';
