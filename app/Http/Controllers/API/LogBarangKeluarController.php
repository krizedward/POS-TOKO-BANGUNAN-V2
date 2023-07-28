<?php

namespace App\Http\Controllers\API;

use App\Models\LogBarangKeluar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogBarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = LogBarangKeluar::take(5)->get();

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
