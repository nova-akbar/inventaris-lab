<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiBarangController;

/* ------------------------------
   HOME PAGE + STATISTIK
------------------------------ */
Route::get('/', [HomeController::class, 'index'])->name('home');

/* ------------------------------
   LAB CRUD
------------------------------ */
Route::resource('lab', LabController::class);

/* DETAIL LAB */
Route::get('/lab/{id}/detail', [LabController::class, 'show'])->name('lab.show');

/* ------------------------------
   BARANG CRUD
------------------------------ */
Route::resource('barang', BarangController::class);

/* ------------------------------
   MUTASI CRUD
------------------------------ */
Route::resource('mutasi_barang', MutasiBarangController::class);
