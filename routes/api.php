<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\MasterBarangController;
use App\Http\Controllers\API\BarangController;
use App\Http\Controllers\API\KategoriBarangUmumController;
use App\Http\Controllers\API\MasterKategoriBarangController;
use App\Http\Controllers\API\BarangStokController;
use App\Http\Controllers\API\HargaBarangModalController;
use App\Http\Controllers\API\BarangSatuanController;
use App\Http\Controllers\API\StokBarangGudangController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// php artisan make:controller API/MasterBarangController --api

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ApiController::class, 'index']);

// Route::get('/master-barang', [MasterBarangController::class, 'index']);
// Route::post('/master-barang/store', [MasterBarangController::class, 'store']);
// Route::get('/master-barang/{id}/show', [MasterBarangController::class, 'show']);
// Route::put('/master-barang/{id}/update', [MasterBarangController::class, 'update']);
// Route::delete('/master-barang/{id}/delete', [MasterBarangController::class, 'destroy']);

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::get('/barang/{id}/show', [BarangController::class, 'show']);
Route::put('/barang/{id}/update', [BarangController::class, 'update']);
Route::delete('/barang/{id}/delete', [BarangController::class, 'destroy']);
Route::get('/barang/trash', [BarangController::class, 'trash']);
Route::get('/barang/{id}/restore', [BarangController::class, 'restore']);
Route::get('/barang/all-restore', [BarangController::class, 'allrestore']);
Route::delete('/barang/force-delete', [BarangController::class, 'forcerestore']);

Route::get('/kategori-barang-umum', [KategoriBarangUmumController::class, 'index']);
Route::post('/kategori-barang-umum/store', [KategoriBarangUmumController::class, 'store']);
Route::get('/kategori-barang-umum/{id}/show', [KategoriBarangUmumController::class, 'show']);
Route::put('/kategori-barang-umum/{id}/update', [KategoriBarangUmumController::class, 'update']);
Route::delete('/kategori-barang-umum/{id}/delete', [KategoriBarangUmumController::class, 'destroy']);

Route::get('/master-kategori-barang', [MasterKategoriBarangController::class, 'index']);
Route::post('/master-kategori-barang/store', [MasterKategoriBarangController::class, 'store']);
Route::get('/master-kategori-barang/{id}/show', [MasterKategoriBarangController::class, 'show']);
Route::put('/master-kategori-barang/{id}/update', [MasterKategoriBarangController::class, 'update']);
Route::delete('/master-kategori-barang/{id}/delete', [MasterKategoriBarangController::class, 'destroy']);

Route::get('/barang-stok', [BarangStokController::class, 'index']);
Route::post('/barang-stok/store', [BarangStokController::class, 'store']);
Route::get('/barang-stok/{id}/show', [BarangStokController::class, 'show']);
Route::put('/barang-stok/{id}/update', [BarangStokController::class, 'update']);
Route::delete('/barang-stok/{id}/delete', [BarangStokController::class, 'destroy']);

Route::get('/harga-barang-modal', [HargaBarangModalController::class, 'index']);
Route::post('/harga-barang-modal/store', [HargaBarangModalController::class, 'store']);
Route::get('/harga-barang-modal/{id}/show', [HargaBarangModalController::class, 'show']);
Route::put('/harga-barang-modal/{id}/update', [HargaBarangModalController::class, 'update']);
Route::delete('/harga-barang-modal/{id}/delete', [HargaBarangModalController::class, 'destroy']);
Route::get('/harga-barang-modal/trash', [HargaBarangModalController::class, 'trash']);
Route::get('/harga-barang-modal/{id}/restore', [HargaBarangModalController::class, 'restore']);
Route::get('/harga-barang-modal/all-restore', [HargaBarangModalController::class, 'allrestore']);
Route::delete('/harga-barang-modal/force-delete', [HargaBarangModalController::class, 'forcerestore']);

Route::get('/barang-satuan', [BarangSatuanController::class, 'index']);
Route::post('/barang-satuan/store', [BarangSatuanController::class, 'store']);
Route::get('/barang-satuan/{id}/show', [BarangSatuanController::class, 'show']);
Route::put('/barang-satuan/{id}/update', [BarangSatuanController::class, 'update']);
Route::delete('/barang-satuan/{id}/delete', [BarangSatuanController::class, 'destroy']);
Route::get('/barang-satuan/trash', [BarangSatuanController::class, 'trash']);
Route::get('/barang-satuan/{id}/restore', [BarangSatuanController::class, 'restore']);
Route::get('/barang-satuan/all-restore', [BarangSatuanController::class, 'allrestore']);
Route::delete('/barang-satuan/force-delete', [BarangSatuanController::class, 'forcerestore']);

// stok barang gudang StokBarangGudangController
Route::get('/stok-barang-gudang', [StokBarangGudangController::class, 'index']);
// Route::post('/stok-barang-gudang/store', [StokBarangGudangController::class, 'store']);
Route::get('/stok-barang-gudang/{id}/show', [StokBarangGudangController::class, 'show']);
Route::put('/stok-barang-gudang/{id}/update', [StokBarangGudangController::class, 'update']);
Route::delete('/stok-barang-gudang/{id}/delete', [StokBarangGudangController::class, 'destroy']);
Route::get('/stok-barang-gudang/trash', [StokBarangGudangController::class, 'trash']);
Route::get('/stok-barang-gudang/{id}/restore', [StokBarangGudangController::class, 'restore']);
Route::get('/stok-barang-gudang/all-restore', [StokBarangGudangController::class, 'allrestore']);
Route::delete('/stok-barang-gudang/force-delete', [StokBarangGudangController::class, 'forcerestore']);

// Route::post('/member-award/store', [MemberAwardController::class, 'store']);
// Route::get('/member-award/{id}/show', [MemberAwardController::class, 'show']);
// Route::put('/member-award/{id}/update', [MemberAwardController::class, 'update']);
// Route::delete('/member-award/{id}/delete', [MemberAwardController::class, 'destroy']);