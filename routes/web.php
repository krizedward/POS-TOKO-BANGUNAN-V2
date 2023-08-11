<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterKategoriBarangController;
use App\Http\Controllers\MasterSatuanBarangController;
use App\Http\Controllers\MasterBarangController;
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
// master barang
Route::get('/master-barang', [MasterBarangController::class, 'index'])->name('master-barang.index');
Route::get('/master-barang/create', [MasterBarangController::class, 'create'])->name('master-barang.create');
Route::post('/master-barang/create', [MasterBarangController::class, 'store'])->name('master-barang.store');
Route::get('/master-barang/{master_barang}', [MasterBarangController::class, 'show'])->name('master-barang.show');
Route::get('/master-barang/{master_barang}/edit', [MasterBarangController::class, 'edit'])->name('master-barang.edit');
Route::put('/master-barang/{master_barang}', [MasterBarangController::class, 'update'])->name('master-barang.update');
Route::delete('/master-barang/{master_barang}', [MasterBarangController::class, 'destroy'])->name('master-barang.destroy');
// softdelete
Route::get('/master-barang/sampah/hapus', [MasterBarangController::class, 'trash'])->name('master-barang.trash');
Route::delete('/master-barang/{master_barang}/hapus', [MasterBarangController::class, 'delete'])->name('master-barang.delete');
Route::get('/master-barang/{master_barang}/kembalikan', [MasterBarangController::class, 'restore'])->name('master-barang.restore');
// master satuan barang
Route::get('/master-satuan-barang', [MasterSatuanBarangController::class, 'index'])->name('master-satuan-barang.index');
Route::get('/master-satuan-barang/create', [MasterSatuanBarangController::class, 'create'])->name('master-satuan-barang.create');
Route::post('/master-satuan-barang/create', [MasterSatuanBarangController::class, 'store'])->name('master-satuan-barang.store');
Route::get('/master-satuan-barang/{master_satuan_barang}', [MasterSatuanBarangController::class, 'show'])->name('master-satuan-barang.show');
Route::get('/master-satuan-barang/{master_satuan_barang}/edit', [MasterSatuanBarangController::class, 'edit'])->name('master-satuan-barang.edit');
Route::put('/master-satuan-barang/{master_satuan_barang}', [MasterSatuanBarangController::class, 'update'])->name('master-satuan-barang.update');
Route::delete('/master-satuan-barang/{master_satuan_barang}', [MasterSatuanBarangController::class, 'destroy'])->name('master-satuan-barang.destroy');
// softdelete
Route::get('/master-satuan-barang/sampah/hapus', [MasterSatuanBarangController::class, 'trash'])->name('master-satuan-barang.trash');
Route::delete('/master-satuan-barang/{master_satuan_barang}/hapus', [MasterSatuanBarangController::class, 'delete'])->name('master-satuan-barang.delete');
Route::get('/master-satuan-barang/{master_satuan_barang}/kembalikan', [MasterSatuanBarangController::class, 'restore'])->name('master-satuan-barang.restore');
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
