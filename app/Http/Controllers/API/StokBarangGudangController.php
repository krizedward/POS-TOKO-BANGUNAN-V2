<?php

namespace App\Http\Controllers\API;

use App\Models\StokBarangGudang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StokBarangGudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [];
        $stok_barang_gudang = StokBarangGudang::all();
        //
        foreach ($stok_barang_gudang as $stok) {
            $data[] = [
                'id' => $stok->id,
                'nama' => $stok->barang->nama,
                'stok_total' => $stok->stok_total,
                'stok_masuk' => $stok->stok_masuk,
                'stok_keluar' => $stok->stok_keluar,
                'status_stok' => $stok->status_stok,
            ];
        }

        return response()->json([
            'status' => 200,
            'data' => $data,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $stok = StokBarangGudang::where('id',$id)->first();

        $data = [
            'id' => $stok->id,
            'nama' => $stok->barang->nama,
            'stok_total' => $stok->stok_total,
            'stok_masuk' => $stok->stok_masuk,
            'stok_keluar' => $stok->stok_keluar,
            'status_stok' => $stok->status_stok,
        ];

        return response()->json([
            'status' => 200,
            'data' => 'detail',
            'data' => $data,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = StokBarangGudang::where('id',$id)->update([
            'stok_total' => $request->stok_total,
            'stok_masuk' => $request->stok_masuk,
            'stok_keluar' => $request->stok_keluar,
            'status_stok' => $request->status_stok,
        ]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil mengubah data',
            'data' => $data,
        ], 200);
    }

}
