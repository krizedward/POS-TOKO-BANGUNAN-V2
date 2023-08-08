<?php

namespace App\Http\Controllers;

use App\Models\MasterKategoriBarang;
use App\Models\KategoriBarangUmum;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MasterKategoriBarangController extends Controller
{
    //
    public function index () {
        
        try {

            $menu = 'kategori-barang';
            $data = MasterKategoriBarang::all();
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.master_kategori_barang.index', 
            compact(
              'menu',
              'data',
            ));


        } catch (\Exception $e) {

            return dd($e->getMessage());
        } 
        
    }

    public function create () 
    {
        try {
            $menu = 'kategori-barang';
            $KategoriUmumProduk = KategoriBarangUmum::all();
            return view('production.master_kategori_barang.create', 
            compact(
                'menu',
                'KategoriUmumProduk',
            ));
        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
        
    }

    public function store(Request $request): RedirectResponse
    {
        try {

            MasterKategoriBarang::create([
                'nama' => $request->nama,
                'kategori_umum_id' => $request->kategori_id,
                'slug' => Str::slug($request->nama), 
            ]);
            
            Alert::success('Success', 'Telah Berhasil Menambahkan Data Master Kategori Barang.');
            
            return Redirect::route('master-kategori-barang.index');

        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
        
    }

    // public function show () {
    //     return 'show';
    // }

    public function edit($id): View 
    {
        $data = MasterKategoriBarang::findOrFail($id);
        $menu = 'kategori-barang';
        $KategoriUmumProduk = KategoriBarangUmum::all();
        return view('production.master_kategori_barang.edit', 
        compact(
            'data',
            'menu',
            'KategoriUmumProduk',
        ));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        MasterKategoriBarang::where('id',$id)->update([
            // 'nama' => $request->nama,
		    // 'slug' => Str::slug($request->nama),
		    // 'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'kategori_umum_id' => $request->kategori_id,
            'slug' => Str::slug($request->nama),
        ]);

        Alert::success('Success', 'Telah Berhasil Mengubah Data Master Kategori Barang.');
        // return 'update';
        return Redirect::route('master-kategori-barang.index');
    }

    public function destroy($id): RedirectResponse 
    {
        try {
    		//testing data
    		// $destroy = 'Kategori Destroy';
    		// dd('destroy');

    		// $data->delete();

    		$data = MasterKategoriBarang::find($id);
        	$data->delete();

	        // return redirect()->route('kategori.suplier.index')
	        //                 ->with('success','Product deleted successfully');

          Alert::success('Success', 'Telah Berhasil Menghapus Data Master Kategori Barang.');

          return Redirect::route('master-kategori-barang.index');

    	} catch (\Exception $e) {
    		// Tangani excption yang terjadi
    		dd($e->getMessage());

    	} 
    }
}