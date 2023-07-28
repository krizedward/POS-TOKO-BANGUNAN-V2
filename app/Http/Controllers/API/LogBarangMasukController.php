<?php

namespace App\Http\Controllers\API;

use App\Models\LogBarangMasuk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = LogBarangMasuk::take(5)->get();

        $namaArray = [];

        foreach ($data as $item) {
          $namaArray[] = [
            'nama' => $item->barang->nama,
            'banyak' => $item->banyak,
            'waktu' => $item->waktu,
          ];
        }

        // Berikan respons terhadap respon diatas
        return response()->json([
          'status' => 200,
          'status_message' => 'sukses',
          'message' => 'Data berhasil ditampilkan',
          'data' => $namaArray,
        ], 200);
    }
}
