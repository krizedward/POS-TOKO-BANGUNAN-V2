<?php

namespace App\Http\Controllers\API;

// Model
use App\Models\BarangStok;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // sop membuat api
        $data = [];
        $barang_stoks = BarangStok::all();
        //fetch data 
        foreach ($barang_stoks as $barang_stok) {
            $data[] = [
                'id' => $barang_stok->id,
                'master_barang' => $barang_stok->master_barang_id,
                'satuan' => $barang_stok->satuan_id,
                'stok_masuk' => $barang_stok->stok_masuk,
                'stok_keluar' => $barang_stok->stok_keluar,
                'status' => $barang_stok->status_stok
            ];
        }
        //respon
        return response()->json([
            'status' => 200,
            'data' => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // sop membuat api
        // validasi
        $request->validate([
            'master_barang_id' => 'required',
        ]);
        // proses
        $data = BarangStok::create([
            'master_barang_id' => $request->master_barang_id,
        ]);
        // respon
        return response()->json([
            'status' => 201,
            'status_message' => 'success',
            'text_message' => 'Data berhasil disimpan',
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // sop membuat api
        $barnagStok = BarangStok::where('id',$id)->first();

        $data = [
            'nama_barang' => $barnagStok->masterBarang->nama,
            'slug' => $barnagStok->slug,
        ];

        // repon
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
