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
    public function index(): View 
    {
        
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

    public function create(): View
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

    public function show(MasterKategoriBarang $id): View {
        $data = MasterKategoriBarang::find($id);
        $menu = 'master';
        return view('production.master_kategori_barang.edit', 
        compact(
            'data',
            'menu',
        ));
    }

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

    public function trash(): View
    {
        // mengampil data guru yang sudah dihapus
        $menu = 'kategori-barang';
        $data = MasterKategoriBarang::onlyTrashed()->get();
        // return view('guru_trash', ['guru' => $guru]);
        return view('production.master_kategori_barang.trash', 
        compact(
          'menu',
          'data',
        ));
        return 'sampah';
    }

    public function hapus_permanen_semua()
    {
    	// hapus permanen semua data guru yang sudah dihapus
    	$data = MasterKategoriBarang::onlyTrashed();
    	$data->forceDelete();
        
        Alert::success('Success', 'Telah Berhasil Menghapus Data Master Kategori Barang.');
    	return Redirect::route('master-kategori-barang.index');
    }

    // hapus permanen
    public function delete($id)
    {
    	// hapus permanen data guru
    	$data = MasterKategoriBarang::onlyTrashed()->where('id',$id);
    	$data->forceDelete();
 
    	Alert::success('Success', 'Telah Berhasil Menghapus Data Master Kategori Barang.');

    	return Redirect::route('master-kategori-barang.index');
    }

    public function restore($id)
    {
    		
    	$data = MasterKategoriBarang::onlyTrashed()->where('id',$id);
    	$data->restore();
 
    	Alert::success('Success', 'Telah Berhasil Mengembalikan Data Master Kategori Barang.');
    	return Redirect::route('master-kategori-barang.index');
    }

    public function kembalikan_semua()
    {
    		
    	$data = MasterKategoriBarang::onlyTrashed();
    	$data->restore();
 
    	Alert::success('Success', 'Telah Berhasil Menghapus Data Master Kategori Barang.');
    	return Redirect::route('master-kategori-barang.index');
    }

}