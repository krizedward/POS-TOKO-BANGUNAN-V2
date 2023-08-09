<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterKategoriBarangController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// master kategori barang
Route::get('/master-kategori-barang', [MasterKategoriBarangController::class, 'index'])->name('master-kategori-barang.index');
Route::get('/master-kategori-barang/create', [MasterKategoriBarangController::class, 'create'])->name('master-kategori-barang.create');
Route::post('/master-kategori-barang/create', [MasterKategoriBarangController::class, 'store'])->name('master-kategori-barang.store');
Route::get('/master-kategori-barang/{master_kategori_barang}', [MasterKategoriBarangController::class, 'show'])->name('master-kategori-barang.show');
Route::get('/master-kategori-barang/{master_kategori_barang}/edit', [MasterKategoriBarangController::class, 'edit'])->name('master-kategori-barang.edit');
Route::put('/master-kategori-barang/{master_kategori_barang}', [MasterKategoriBarangController::class, 'update'])->name('master-kategori-barang.update');
Route::delete('/master-kategori-barang/{master_kategori_barang}', [MasterKategoriBarangController::class, 'destroy'])->name('master-kategori-barang.destroy');
// softdelete
Route::get('/master-kategori-barang/sampah/hapus', [MasterKategoriBarangController::class, 'trash'])->name('master-kategori-barang.trash');
Route::delete('/master-kategori-barang/{master_kategori_barang}/hapus', [MasterKategoriBarangController::class, 'delete'])->name('master-kategori-barang.delete');
Route::get('/master-kategori-barang/{master_kategori_barang}/kembalikan', [MasterKategoriBarangController::class, 'restore'])->name('master-kategori-barang.restore');

// Route::get('/', function () {
//     return view('welcome');
// });
