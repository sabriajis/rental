<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\RentalMobilController;

Route::get('/', function () {
    return view('auth.auth-login');
});

// Grup route dengan middleware 'auth' (untuk pengguna yang sudah login)
Route::middleware(['auth'])->group(function () {

    // Halaman Dashboard
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');

    // Grup route untuk admin
    Route::middleware(['role:admin'])->group(function () {
        // Route to display rental mobil list
        Route::get('/rental', [RentalMobilController::class, 'index'])->name('rental.index');

        // Menambahkan mobil baru (GET untuk form dan POST untuk simpan)
        Route::get('/rental/create', [RentalMobilController::class, 'create'])->name('rental.create');
        Route::post('/rental', [RentalMobilController::class, 'store'])->name('rental.store');

        // Mengedit mobil (GET untuk form dan PUT untuk update)
        Route::get('/rental/{id}/edit', [RentalMobilController::class, 'edit'])->name('rental.edit');
        Route::put('/rental/{id}', [RentalMobilController::class, 'update'])->name('rental.update');

        // Menghapus mobil (DELETE)
        Route::delete('/rental/{id}', [RentalMobilController::class, 'destroy'])->name('rental.destroy');

        // Mengelola user (menggunakan resource controller)
        Route::resource('user', UserController::class);
    });

    Route::middleware(['role:user'])->group(function () {
        // Route untuk menampilkan daftar mobil yang bisa disewa
        Route::get('/sewa', [MobilController::class, 'index'])->name('sewa.index');

        // Menampilkan formulir sewa untuk mobil tertentu
        Route::get('sewa/create/{mobil}', [SewaController::class, 'create'])->name('sewa.create');

        // Menyimpan data sewa dan melanjutkan ke pembayaran
        Route::post('sewa', [SewaController::class, 'store'])->name('sewa.store');

        // Menampilkan halaman konfirmasi pembayaran
        Route::get('pembayaran/{sewa}', [PembayaranController::class, 'index'])->name('pembayaran.index');

        // Mengarahkan ke Midtrans untuk proses pembayaran
        Route::post('pembayaran/process', [PembayaranController::class, 'process'])->name('pembayaran.process');


        Route::get('/pembayaran/notification/{sewa}', [PembayaranController::class, 'notification'])->name('notification');
    });
});
