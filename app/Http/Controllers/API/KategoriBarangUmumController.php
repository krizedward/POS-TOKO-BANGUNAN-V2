<?php

namespace App\Http\Controllers\API;

// Model
use App\Models\KategoriBarangUmum;

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
        // sop membuat api
        $data = []; // variable
        $kategoris = KategoriBarangUmum::all();
        // fetch data
        foreach ($kategoris as $kategori) {
            $data[] = [
                'id' => $kategori->id,
                'nama' => $kategori->nama,
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
        // proses
        // respon
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
        $kategori = KategoriBarangUmum::where('id',$id)->first();
        
        $data = [
            'nama' => $kategori->nama,
            'slug' => $kategori->slug,
        ];
        //respon
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
