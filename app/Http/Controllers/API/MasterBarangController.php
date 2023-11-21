<?php

namespace App\Http\Controllers\API;

// Model
use App\Models\MasterBarang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = MasterBarang::all();
        // return response()->json(['message' => 'Success'], 200);

        $data = MasterBarang::all();

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data Master Barang Berhasil Ditampilkan',
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
        try {
            // validator
            $request->validate([
                'nama' => 'required',
                'keterangan' => 'required',
                'kategori_id' => 'required',
                // 'quantity_purchased' => 'integer|nullable',
                // 'status' => 'in:paid,unpaid',
                // Anda dapat menambahkan validasi tambahan sesuai kebutuhan Anda
            ]);

            // proses
            $data = MasterBarang::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'kategori_id' => $request->kategori_id,
                'slug' => Str::slug($request->nama), 
            ]);
    
            return response()->json([
              'status' => 201,
              'status_message' => 'success',
              'text_message' => 'Data berhasil disimpan',
              'data' => $data,
            ], 201);

        } catch (\Exception $e) {
            //
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memasukan data',
                'error' => $e->getMessage(),
            ], 500);
            //
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // coming soon
        try {
            $data = MasterBarang::where('id',$id)->first();

            return response()->json([
                'status' => 200,
                'status_message' => 'success',
                'text_message' => 'Data berhasil ditampilkan',
                'data' => $data,
            ], 200);
        } catch (\Excetption $e) {
            return response()->json([
              'status' => 'error',
              'message' => 'Gagal menyimpan data',
              'error' => $e->getMessage(),
            ], 500);
        }
        
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
