<?php

namespace App\Http\Controllers\API;

// Model
use App\Models\MasterKategoriBarang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterKategoriBarangController extends Controller
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
        $master_kategoris = MasterKategoriBarang::all();
        // fetch data
        foreach ($master_kategoris as $master_kategori) {
            $data[] = [
                'id' => $master_kategori->id,
                'nama' => $master_kategori->nama,
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
        // sop membuat api
        $master_kategoris = MasterKategoriBarang::where('id',$id)->first();

        $data = [
            'nama' => $master_kategoris->nama,
            'slug' => $master_kategoris->slug,
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
