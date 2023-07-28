<?php

namespace App\Http\Controllers;

use App\Models\KategoriSuplier;
use Illuminate\Support\Str;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class KategoriSuplierController extends Controller
{
    //
    public function index(): View
    { // menampilkan data yang ada di kategori_produk
        try {
        	// testing data
        	$data = KategoriSuplier::all();
        	// dd($index);
        	return view('skull.admin.kategori_suplier_index', compact('data'));

        } catch (\Exception $e) {
		    // Tangani exception yang terjadi
		    // $result = null;
		    dd($e->getMessage());

		}
    }

    public function create(): View
    { // menampilkan form data yang ada di kategori_produk
        try {
        	// testing data
        	// dd($create);
        	return view('skull.admin.kategori_suplier_create');

        } catch (\Exception $e) {
        	// Tangani exception yang terjadi
        	dd($e->getMessage());

        }
    }

    public function store(Request $request): RedirectResponse
    { // menyimpan data form yang ada di kategori_produk
        try {
        	// validasi data
        	$request->validate([
	            'nama' => 'required|min:1',
	            'deskripsi' => 'required|min:10',
	        ]);
	        
	        // menyimpan data
	        KategoriSuplier::create([
	        	'kode_id' => "KP",
				'kode_nomor' => Str::padLeft(mt_rand(1, 99999), 5, '0'),
				'nama' => $request->nama,
				'slug' => Str::slug($request->nama),
				'deskripsi' => $request->deskripsi,
	        ]);
	        
	        // kembali ke halaman
	        return redirect()->route('kategori.suplier.index')
	                        ->with('success','Product created successfully.');

        } catch (\Exception $e) {
        	// Tangani exception yang terjadi
        	dd($e->getMessage());

        }
    }

    public function show(KategoriSuplier $id): View
    { // menampilkan data berdasarkan id yang ada di kategori_produk
        try {
        	// testing data
        	// $show = 'Kategori Produk Show Form '.$id;
        	// dd($show);
        	$data = KategoriSuplier::find($id);
        	return view('skull.admin.kategori_suplier_show', compact('data'));

        } catch (\Exception $e) {
        	// Tangani exception yang terjadi
        	dd($e->getMessage());
        }
    }

    public function edit(KategoriSuplier $id): View
    { // menampilkan form edit data yang ada di kategori_produk
    	try {
    		// testing data
    		// $edit = 'Kategori Produk Edit'.$id;
    		// dd($edit);

    		$data = KategoriSuplier::find($id);
        	return view('skull.admin.kategori_suplier_edit', compact('data'));

    	} catch (\Exception $e) {
    		// Tangani exception yang terjadi
        	dd($e->getMessage());
    	
    	}
    }

    public function update(Request $request, $id): RedirectResponse
    { // menyimpan data form edit yang ada di kategori_produk
    	try {

	        $this->validate($request, [
	            'nama' => 'required',
	            'deskripsi' => 'required',
	        ]);

	        KategoriSuplier::where('id',$id)->update([
                'nama' => $request->nama,
				'slug' => Str::slug($request->nama),
				'deskripsi' => $request->deskripsi,
            ]);
	        
	        // kembali ke halaman
	        return redirect()->route('kategori.suplier.index')
	                        ->with('success','Product created successfully.');

    	} catch (\Exception $e) {
    		// Tangani exception yang terjadi
        	dd($e->getMessage());	
    	}
    }

    public function destroy($id): RedirectResponse
    { // menghapus data
    	try {
    		//testing data
    		// $destroy = 'Kategori Destroy';
    		// dd('destroy');

    		// $data->delete();

    		$data = KategoriSuplier::find($id);
        	$data->delete();

	        return redirect()->route('kategori.suplier.index')
	                        ->with('success','Product deleted successfully');

    	} catch (\Exception $e) {
    		// Tangani excption yang terjadi
    		dd($e->getMessage());

    	}  
    }
    
}
