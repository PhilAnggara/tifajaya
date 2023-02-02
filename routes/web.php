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
    // Route::resource('perusahaan', PerusahaanController::class)->middleware('role:Admin,Kepala Seksi');
    Route::resource('perusahaan', PerusahaanController::class);

    
    Route::get('surat-perintah-pengujian', [MainController::class, 'suratPerintah'])->name('surat-perintah-pengujian');
    // Route::get('pengujiaan', [MainController::class, 'pengujiaan'])->name('pengujiaan')->middleware('role:Kepala Seksi,Kepala Lab');
    Route::get('pengujiaan', [MainController::class, 'pengujiaan'])->name('pengujiaan');
    Route::get('laporan-pengujian', [MainController::class, 'laporanPengujian'])->name('laporan-pengujian');
    Route::get('surat-pengantar-pengujian', [MainController::class, 'suratPengantar'])->name('surat-pengantar-pengujian');
    // Route::resource('kelola-pengguna', UserController::class)->middleware('role:Kepala Seksi');
    Route::resource('kelola-pengguna', UserController::class);
});

// Route::get('test', function () {
//     return view('pages.home1');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
