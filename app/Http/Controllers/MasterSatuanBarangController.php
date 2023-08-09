<?php

namespace App\Http\Controllers;

use App\Models\MasterSatuanBarang;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MasterSatuanBarangController extends Controller
{
    //
    public function index(): View 
    {
        
        try {

            $menu = 'satuan-barang';
            $data = MasterSatuanBarang::all();
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.master_satuan_barang.index', 
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
            $menu = 'satuan-barang';
            return view('production.master_satuan_barang.create', 
            compact(
                'menu',
            ));
        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
        
    }

    public function store(Request $request): RedirectResponse
    {
        try {

            MasterSatuanBarang::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'slug' => Str::slug($request->nama), 
            ]);
            
            Alert::success('Success', 'Telah Berhasil Menambahkan Data Master satuan Barang.');
            
            return Redirect::route('master-satuan-barang.index');

        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
        
    }

    public function show(MasterSatuanBarang $id): View {
        $data = MasterSatuanBarang::find($id);
        $menu = 'master';
        return view('production.master_satuan_barang.edit', 
        compact(
            'data',
            'menu',
        ));
    }

    public function edit($id): View 
    {
        $data = MasterSatuanBarang::findOrFail($id);
        $menu = 'satuan-barang';
        return view('production.master_satuan_barang.edit', 
        compact(
            'data',
            'menu',
        ));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        MasterSatuanBarang::where('id',$id)->update([
            // 'nama' => $request->nama,
		    // 'slug' => Str::slug($request->nama),
		    // 'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'slug' => Str::slug($request->nama),
        ]);

        Alert::success('Success', 'Telah Berhasil Mengubah Data Master satuan Barang.');
        // return 'update';
        return Redirect::route('master-satuan-barang.index');
    }

    public function destroy($id): RedirectResponse 
    {
        try {
    		//testing data
    		// $destroy = 'satuan Destroy';
    		// dd('destroy');

    		// $data->delete();

    		$data = MasterSatuanBarang::find($id);
        	$data->delete();

	        // return redirect()->route('satuan.suplier.index')
	        //                 ->with('success','Product deleted successfully');

          Alert::success('Success', 'Telah Berhasil Menghapus Data Master satuan Barang.');

          return Redirect::route('master-satuan-barang.index');

    	} catch (\Exception $e) {
    		// Tangani excption yang terjadi
    		dd($e->getMessage());

    	} 
    }

    public function trash(): View
    {
        // mengampil data guru yang sudah dihapus
        $menu = 'satuan-barang';
        $data = MasterSatuanBarang::onlyTrashed()->get();
        // return view('guru_trash', ['guru' => $guru]);
        return view('production.master_satuan_barang.trash', 
        compact(
          'menu',
          'data',
        ));
        return 'sampah';
    }

    public function hapus_permanen_semua()
    {
    	// hapus permanen semua data guru yang sudah dihapus
    	$data = MasterSatuanBarang::onlyTrashed();
    	$data->forceDelete();
        
        Alert::success('Success', 'Telah Berhasil Menghapus Data Master satuan Barang.');
    	return Redirect::route('master-satuan-barang.index');
    }

    // hapus permanen
    public function delete($id)
    {
    	// hapus permanen data guru
    	$data = MasterSatuanBarang::onlyTrashed()->where('id',$id);
    	$data->forceDelete();
 
    	Alert::success('Success', 'Telah Berhasil Menghapus Data Master satuan Barang.');

    	return Redirect::route('master-satuan-barang.index');
    }

    public function restore($id)
    {
    		
    	$data = MasterSatuanBarang::onlyTrashed()->where('id',$id);
    	$data->restore();
 
    	Alert::success('Success', 'Telah Berhasil Mengembalikan Data Master satuan Barang.');
    	return Redirect::route('master-satuan-barang.index');
    }

    public function kembalikan_semua()
    {
    		
    	$data = MasterSatuanBarang::onlyTrashed();
    	$data->restore();
 
    	Alert::success('Success', 'Telah Berhasil Menghapus Data Master satuan Barang.');
    	return Redirect::route('master-satuan-barang.index');
    }

}
