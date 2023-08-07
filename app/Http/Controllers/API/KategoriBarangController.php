<?php

namespace App\Http\Controllers\API;

use App\Models\KategoriBarang;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KategoriBarang::all();
        $namaKategori = [];
        
        foreach ($data as $item) {
          $namaKategori[] = [
            'nama' => $item->nama,
            'created_at' => $item->created_at,
            'update_at' => $item->updated_at,
          ];
        }

        return response()->json([
            'status' => 200,
            'status_message' => 'sukses',
            'message' => 'Data berhasil ditampilkan',
            'data' => $namaKategori,
        ], 200);
        //
        // try {

        //     // Berikan respons terhadap respon diatas
        //     return response()->json([
        //     'status' => 200,
        //     'status_message' => 'sukses',
        //     'message' => 'Data berhasil ditampilkan',
        //     'data' => $namaBarangArray,
        //     ], 200);

        // } catch (\Exception $e) {
            
        //     // Tangani exception yang terjadi
        //     return response()->json([
        //       'status' => 'error',
        //       'message' => 'Gagal menyimpan data',
        //       'error' => $e->getMessage()
        //     ], 500);
    
        // }
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
            KategoriBarang::create([
                'kategori_umum_id' => $request->kategori_umum_id,
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
            ]);

            $kategori = KategoriBarang::orderBy('created_at', 'desc')->first();

            $data = [
              'nama' => $kategori->nama, 
            ];

            return response()->json([
                'status' => 201,
                'status_message' => 'sukses',
                'message' => 'Data berhasil disimpan',
                'data' => $data,
            ], 201);
        } catch (\Exception $e) {

            // Tangani exception yang terjadi
            return response()->json([
              'status' => 'error',
              'message' => 'Gagal menyimpan data',
              'error' => $e->getMessage()
            ], 500);
    
          }
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
