<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\API\BarangSatuanController;
use App\Http\Controllers\API\BarangController;
use App\Http\Controllers\API\BarangUkuranController;
use App\Http\Controllers\API\BarangMasterController;
use App\Http\Controllers\API\BarangStokController;
use App\Http\Controllers\API\BarangFotoController;
use App\Http\Controllers\API\LogBarangMasukController;
use App\Http\Controllers\API\LogBarangKeluarController;
use App\Http\Controllers\API\BarangTotalStokController;
use App\Http\Controllers\API\OrderBarangController;
use App\Http\Controllers\API\TemporderBarangController;
use App\Http\Controllers\API\KategoriBarangController;
use App\Http\Controllers\API\KategoriBarangUmumController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// kategori barang umum
Route::get('/kategori-barang-umum', [KategoriBarangUmumController::class, 'index']);
// kategori barang
Route::get('/kategori-barang', [KategoriBarangController::class, 'index']);
Route::post('/kategori-barang', [KategoriBarangController::class, 'store']);
// temporder barang
Route::get('/temporder-barang', [TemporderBarangController::class, 'index']);
// order barang
Route::get('/order-barang', [OrderBarangController::class, 'index']);
// barang satuan
Route::get('/barang-satuan', [BarangSatuanController::class, 'index']);
// barang
Route::get('/barang', [BarangController::class, 'index']);
// barang ukuran
Route::get('/barang-ukuran', [BarangUkuranController::class, 'index']);
// barang master
Route::get('/barang-master', [BarangMasterController::class, 'index']);
// barang total stok
Route::get('/barang-total-stok', [BarangTotalStokController::class, 'index']);
// barang stok
Route::get('/barang-stok', [BarangStokController::class, 'index']);
Route::post('/barang-stok', [BarangStokController::class, 'store']);
Route::get('/barang-stok/{id}', [BarangStokController::class, 'show']);
Route::put('/barang-stok/{id}', [BarangStokController::class, 'update']);
Route::delete('/barang-stok/{id}', [BarangStokController::class, 'destroy']);
// log barang masuk
Route::get('/log-barang-masuk', [LogBarangMasukController::class, 'index']);
Route::post('/log-barang-masuk', [LogBarangMasukController::class, 'store']);
Route::get('/log-barang-masuk/{id}', [LogBarangMasukController::class, 'show']);
Route::put('/log-barang-masuk/{id}', [LogBarangMasukController::class, 'update']);
Route::delete('/log-barang-masuk/{id}', [LogBarangMasukController::class, 'destroy']);
// log barang keluar
Route::get('/log-barang-keluar', [LogBarangKeluarController::class, 'index']);
// barang foto
Route::get('/barang-foto', [BarangFotoController::class, 'index']);

Route::get('/kategori-produk', [KategoriProdukController::class, 'index'])->name('kategori.produk.index');
Route::post('/kategori-produk', [KategoriProdukController::class, 'store'])->name('kategori.produk.store');
