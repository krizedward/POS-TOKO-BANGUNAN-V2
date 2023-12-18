<?php

namespace App\Http\Controllers\API;

// Model
use App\Models\HargaBarangModal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HargaBarangModalController extends Controller
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
        $hargas = HargaBarangModal::all();

        foreach ($hargas as $harga) {
            $data[] = [
                'nama_barang' => $harga->barang->nama,
                'harga_barang' => $harga->harga,
                'jumlah_barang' => $harga->jumlah,
                'tanggal_harga' => $harga->tanggal_harga,
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
        //validasi
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'tanggal_harga' => 'required',
        ]);
        //create
        $data = HargaBarangModal::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'tanggal_harga' => $request->tanggal_harga,
        ]);
        //respon
        return response()->json([
            'status' => 200,
            'data' => 'berhasil',
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
        $harga  = HargaBarangModal::where('id',$id)->first();
        
        $data = [
            'nama_barang' => $harga->barang->nama,
            'harga_barang' => $harga->harga,
            'jumlah_barang' => $harga->jumlah,
            'tanggal_harga' => $harga->tanggal_harga,
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
        //
        $data = HargaBarangModal::where('id',$id)->update([
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'tanggal_harga' => $request->tanggal_harga,
        ]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil mengubah data',
            // 'data' => $data,
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
        $data = HargaBarangModal::findOrFail($id);
        $data->delete();

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil dihapus'
        ], 200);
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
    	$data = HargaBarangModal::onlyTrashed()->get();
    	// return view('guru_trash', ['guru' => $guru]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil mengubah data',
            'data' => $data,
        ], 200);
    }

    public function restore($id)
    {
        // mengampil data guru yang sudah dihapus
        $data = HargaBarangModal::onlyTrashed()->where('id',$id);
    	$data->restore();
    	// $data = HargaBarangModal::onlyTrashed()->get();
    	// return view('guru_trash', ['guru' => $guru]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil mengubah data',
            'data' => $data,
        ], 200);
    }

    public function allrestore()
    {
        // mengampil data guru yang sudah dihapus
        $data = HargaBarangModal::onlyTrashed();
    	$data->restore();
    	// $data = HargaBarangModal::onlyTrashed()->get();
    	// return view('guru_trash', ['guru' => $guru]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil mengubah data',
            'data' => $data,
        ], 200);
    }

    public function forcerestore()
    {
        // mengampil data guru yang sudah dihapus
        $data = HargaBarangModal::onlyTrashed();
    	$data->forceDelete();
    	// $data = HargaBarangModal::onlyTrashed()->get();
    	// return view('guru_trash', ['guru' => $guru]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil mengubah data',
            'data' => $data,
        ], 200);
    }
}
