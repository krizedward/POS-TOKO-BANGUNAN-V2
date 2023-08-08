<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Q2YAX9E4ZTTKH9WWQKA9HWQ8BSP7XIOU
*/

// Route::get('/', function () { return view('welcome'); });
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterKategoriBarangController;

// use App\Http\Controllers\BarangController;
// use App\Http\Controllers\BarangStokController;
// use App\Http\Controllers\LogBarangMasukController;
// use App\Http\Controllers\LogBarangKeluarController;
// use App\Http\Controllers\KategoriBarangUmumController;
// use App\Http\Controllers\KategoriBarangController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('master-kategori-barang', MasterKategoriBarangController::class);

// Route::resource('barang', BarangController::class);
// Route::resource('barang-stok', BarangStokController::class);
// Route::resource('log-barang-masuk', LogBarangMasukController::class);
// Route::resource('log-barang-keluar', LogBarangKeluarController::class);
// Route::resource('kategori-barang-umum', KategoriBarangUmumController::class);
// Route::resource('kategori-barang', KategoriBarangController::class);

// Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
// Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
// Route::post('/barang/create', [BarangController::class, 'store'])->name('barang.store');