<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterKategoriBarangController;
use App\Http\Controllers\MasterSatuanBarangController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\BarangStokController;
use App\Http\Controllers\LogBarangMasukController;
use App\Http\Controllers\LogBarangKeluarController;
use App\Http\Controllers\HargaBarangModalController;
use App\Http\Controllers\HargaBarangLusinController;
use App\Http\Controllers\HargaBarangEcerController;

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

Route::get('/', function (){
  return 'berhasil';
});
// Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// harga barang modal
Route::get('/harga-barang-ecer', [HargaBarangEcerController::class, 'index'])->name('harga-barang-ecer.index');
// harga barang modal
Route::get('/harga-barang-lusin', [HargaBarangLusinController::class, 'index'])->name('harga-barang-lusin.index');
// harga barang modal
Route::get('/harga-barang-modal', [HargaBarangModalController::class, 'index'])->name('harga-barang-modal.index');
// log barang keluar
//Route::get('/log-barang-keluar', [LogBarangKeluarController::class, 'index'])->nama('log-barang-keluar.index');
Route::get('/log-barang-keluar', [LogBarangKeluarController::class, 'index'])->name('log-barang-keluar.index');
Route::get('/log-barang-keluar/{log_barang_keluar}', [LogBarangKeluarController::class, 'show'])->name('log-barang-keluar.show');
// log barang masuk
Route::get('/log-barang-masuk', [LogBarangMasukController::class, 'index'])->name('log-barang-masuk.index');
Route::get('/log-barang-masuk/{log_barang_masuk}', [LogBarangMasukController::class, 'show'])->name('log-barang-masuk.show');
//barang stok
Route::get('/barang-stok', [BarangStokController::class, 'index'])->name('barang-stok.index');
Route::get('/barang-stok/create', [BarangStokController::class, 'create'])->name('barang-stok.create');
Route::post('/barang-stok/create', [BarangStokController::class, 'store'])->name('barang-stok.store');
Route::get('/barang-stok/{barang_stok}', [BarangStokController::class, 'show'])->name('barang-stok.show');
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
