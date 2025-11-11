<?php

use Illuminate\Support\Facades\Route;

// Mengimpor (import) class LabController agar dapat digunakan di dalam route. Class ini berisi logika untuk mengatur data yang berhubungan dengan tabel "lab".
use App\Http\Controllers\LabController;

// Mengimpor class BarangController untuk menangani logika terkait data barang.
use App\Http\Controllers\BarangController;

// Mengimpor class MutasiBarangController yang menangani proses mutasi (perpindahan) barang antar lab.
use App\Http\Controllers\MutasiBarangController;

// Mendefinisikan route utama ("/") agar ketika pengguna membuka halaman utama website, Laravel akan memanggil method "index" dari class LabController. Biasanya method "index" digunakan untuk menampilkan daftar data dari tabel "lab".
Route::get('/', [LabController::class, 'index']);

// Membuat route resource untuk entitas "lab". Route resource secara otomatis membuat seluruh route CRUD (Create, Read, Update, Delete)
Route::resource('lab', LabController::class);

// Membuat route resource untuk entitas "barang" dengan prinsip yang sama. Artinya, setiap fungsi standar CRUD akan diarahkan otomatis ke barang_controller.
Route::resource('barang', BarangController::class);

// Membuat route resource untuk entitas "mutasi_barang". Controller ini akan mengatur proses pemindahan atau mutasi barang dari satu lab ke lab lain.
Route::resource('mutasi_barang', MutasiBarangController::class);
