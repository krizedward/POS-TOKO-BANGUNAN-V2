<?php

namespace App\Http\Controllers\API;

use App\Models\KategoriBarangUmum;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriBarangUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = KategoriBarangUmum::all();
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
