<?php

namespace App\Http\Controllers;

use App\Models\BarangStok;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BarangStokController extends Controller
{
    //
    public function index(): View 
    {
        
        try {

            $menu = 'barang-stok';
            $data = BarangStok::all();
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.barang_stok.index', 
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
            // $MasterSatuanBarang = MasterSatuanBarang::all();
            $MasterKategoriBarang = MasterKategoriBarang::all();
            $menu = 'master-barang';
            return view('production.master_barang.create', 
            compact(
                'menu',
                // 'MasterSatuanBarang',
                'MasterKategoriBarang',
            ));
        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
        
    }

    public function store(Request $request): RedirectResponse
    {
        try {

            MasterBarang::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'kategori_id' => $request->kategori_id,
                // 'satuan_id' => $request->satuan_id,
                'slug' => Str::slug($request->nama), 
            ]);
            
            Alert::success('Success', 'Telah Berhasil Menambahkan Data Master satuan Barang.');
            
            return Redirect::route('master-barang.index');

        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
        
    }

    // public function show(MasterSatuanBarang $id): View {
    //     $data = MasterSatuanBarang::find($id);
    //     $menu = 'master';
    //     return view('production.master_satuan_barang.edit', 
    //     compact(
    //         'data',
    //         'menu',
    //     ));
    // }

    public function edit($id): View 
    {
        $data = MasterBarang::findOrFail($id);
        // $MasterSatuanBarang = MasterSatuanBarang::all();
        $MasterKategoriBarang = MasterKategoriBarang::all();
        $menu = 'satuan-barang';
        return view('production.master_barang.edit', 
        compact(
            'data',
            'menu',
            'MasterKategoriBarang',
            // 'MasterSatuanBarang',
        ));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        MasterBarang::where('id',$id)->update([
            // 'nama' => $request->nama,
		    // 'slug' => Str::slug($request->nama),
		    // 'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            // 'satuan_id' => $request->satuan_id,
            'keterangan' => $request->keterangan,
            'slug' => Str::slug($request->nama),
        ]);

        Alert::success('Success', 'Telah Berhasil Mengubah Data Master satuan Barang.');
        // return 'update';
        return Redirect::route('master-barang.index');
    }

    public function destroy($id): RedirectResponse 
    {
        try {
    		//testing data
    		// $destroy = 'satuan Destroy';
    		// dd('destroy');

    		// $data->delete();

    		$data = MasterBarang::find($id);
        	$data->delete();

	        // return redirect()->route('satuan.suplier.index')
	        //                 ->with('success','Product deleted successfully');

          Alert::success('Success', 'Telah Berhasil Menghapus Data Master satuan Barang.');

          return Redirect::route('master-barang.index');

    	} catch (\Exception $e) {
    		// Tangani excption yang terjadi
    		dd($e->getMessage());

    	} 
    }

    public function trash(): View
    {
        // mengampil data guru yang sudah dihapus
        $menu = 'master-barang';
        $data = MasterBarang::onlyTrashed()->get();
        // return view('guru_trash', ['guru' => $guru]);
        return view('production.master_barang.trash', 
        compact(
          'menu',
          'data',
        ));
        // return 'sampah';
    }

    public function hapus_permanen_semua()
    {
    	// hapus permanen semua data guru yang sudah dihapus
    	$data = MasterBarang::onlyTrashed();
    	$data->forceDelete();
        
        Alert::success('Success', 'Telah Berhasil Menghapus Data Master satuan Barang.');
    	return Redirect::route('master-barang.index');
    }

    // hapus permanen
    public function delete($id)
    {
    	// hapus permanen data guru
    	$data = MasterBarang::onlyTrashed()->where('id',$id);
    	$data->forceDelete();
 
    	Alert::success('Success', 'Telah Berhasil Menghapus Data Master satuan Barang.');

    	return Redirect::route('master-barang.index');
    }

    public function restore($id)
    {
    		
    	$data = MasterBarang::onlyTrashed()->where('id',$id);
    	$data->restore();
 
    	Alert::success('Success', 'Telah Berhasil Mengembalikan Data Master satuan Barang.');
    	return Redirect::route('master-barang.index');
    }

    public function kembalikan_semua()
    {
    		
    	$data = MasterBarang::onlyTrashed();
    	$data->restore();
 
    	Alert::success('Success', 'Telah Berhasil Menghapus Data Master satuan Barang.');
    	return Redirect::route('master-barang.index');
    }

}
