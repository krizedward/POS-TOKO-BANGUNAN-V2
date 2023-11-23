<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\MasterBarangController;

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

Route::get('/master-barang', [MasterBarangController::class, 'index']);
Route::post('/master-barang/store', [MasterBarangController::class, 'store']);
Route::get('/master-barang/{id}/show', [MasterBarangController::class, 'show']);
Route::put('/master-barang/{id}/update', [MasterBarangController::class, 'update']);
Route::delete('/master-barang/{id}/delete', [MasterBarangController::class, 'destroy']);

// Route::post('/member-award/store', [MemberAwardController::class, 'store']);
// Route::get('/member-award/{id}/show', [MemberAwardController::class, 'show']);
// Route::put('/member-award/{id}/update', [MemberAwardController::class, 'update']);
// Route::delete('/member-award/{id}/delete', [MemberAwardController::class, 'destroy']);