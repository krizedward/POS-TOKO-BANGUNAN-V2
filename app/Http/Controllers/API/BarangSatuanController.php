<?php

namespace App\Http\Controllers\API;

// Model
use App\Models\BarangSatuan;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BarangSatuanController extends Controller
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
        $satuans = BarangSatuan::all();

        foreach ($satuans as $satuan) {
            $data[] = [
                'id' => $satuan->id,
                'nama' => $satuan->nama,
                'slug' => $satuan->slug,
                'keterangan' => $satuan->keterangan,
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
        // validasi
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);
        // create
        $data = BarangSatuan::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'keterangan' => $request->keterangan,
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
        $satuan  = BarangSatuan::where('id',$id)->first();
        
        $data = [
            'nama' => $satuan->nama,
            'harga' => $satuan->slug,
            'keterangan' => $satuan->keterangan,
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
        // $request->validate([
        //     'nama' => 'reqired',
        //     'keterangan' => 'reqired',
        // ]);

        // validate
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        // check for validation failure
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // process
        $data = BarangSatuan::where('id', $id)->update([
            'nama' => $request->input('nama'),
            'slug' => Str::slug($request->input('nama')),
            'keterangan' => $request->input('keterangan'),
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
        $data = BarangSatuan::findOrFail($id);
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
    	$data = BarangSatuan::onlyTrashed()->get();
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
        $data = BarangSatuan::onlyTrashed()->where('id',$id);
    	$data->restore();
    	// $data = BarangSatuan::onlyTrashed()->get();
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
        $data = BarangSatuan::onlyTrashed();
    	$data->restore();
    	// $data = BarangSatuan::onlyTrashed()->get();
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
        $data = BarangSatuan::onlyTrashed();
    	$data->forceDelete();
    	// $data = BarangSatuan::onlyTrashed()->get();
    	// return view('guru_trash', ['guru' => $guru]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil mengubah data',
            'data' => $data,
        ], 200);
    }
}
