<?php

namespace App\Http\Controllers\API;

// Model
use App\Models\Barang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 'berhasil';
        $data = [];
        $barangs = Barang::all();

        foreach ($barangs as $barang) {
            $data[] = [
                'id' => $barang->id,
                'nama' => $barang->nama,
            ];
        }

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
        //
        // validasi
        $request->validate([
            'nama' => 'required',
        ]);
        // create
        $data = Barang::create([
            'nama' => $request->nama,
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
        //
        $barang  = Barang::where('id',$id)->first();
        
        $data = [
            'nama' => $barang->nama,
            'harga' => $barang->harga,
            'kategori' => $barang->kategori,
            // Tambahkan data lain yang ingin ditampilkan di sini
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
        // validate
        $request->validate([
            'nama' => 'reqired',
        ]);

        $data = Barang::where('id',$id)->update([
            'nama' => $request->nama,
            // 'harga' => $request->harga,
            // 'kategori' => $request->kategori,
            // 'slug' => Str::slug($request->nama),
            // 'deskripsi' => $request->deskripsi,
            // 'nama' => $request->nama,
            // 'slug' => Str::slug($request->nama),
            // 'nickname' => $request->nickname,
        ]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil mengubah data',
            'data' => $data,
        ], 200);
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
        $data = Barang::findOrFail($id);
        $data->delete();

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil dihapus'
        ], 200);
    }
}
