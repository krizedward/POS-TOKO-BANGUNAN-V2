<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\KategoriUmumProduk;
use App\Models\KategoriProdukDetail;
use Illuminate\Support\Str;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class KategoriProdukController extends Controller
{
    //
    public function index(): View
    { // menampilkan data yang ada di kategori_produk
      try {
      	// testing data
      	$data = KategoriProduk::all();
				$menu = 'kategori-produk';
      	// dd($index);
      	return 
				view('kategori_produk.index', 
					compact(
						'data',
						'menu'
					)
				);
      	// return view('skull.admin.kategori_produk_index', compact('data'));
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
      	return view('kategori_produk.create');
      	// return view('skull.admin.kategori_produk_create');
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
	        KategoriProduk::create([
	        	'kode_id' => "KP",
				'kode_nomor' => Str::padLeft(mt_rand(1, 99999), 5, '0'),
				'nama' => $request->nama,
				'slug' => Str::slug($request->nama),
				'deskripsi' => $request->deskripsi,
	        ]);
	        
	        // kembali ke halaman
	        return redirect()->route('kategori.produk.index')
	                        ->with('success','Product created successfully.');

        } catch (\Exception $e) {
        	// Tangani exception yang terjadi
        	dd($e->getMessage());

        }
    }

    public function show(KategoriProduk $id): View
    { // menampilkan data berdasarkan id yang ada di kategori_produk
        try {
        	// testing data
        	// $show = 'Kategori Produk Show Form '.$id;
        	// dd($show);
        	$data = KategoriProduk::find($id);
        	return view('skull.admin.kategori_produk_show', compact('data'));

        } catch (\Exception $e) {
        	// Tangani exception yang terjadi
        	dd($e->getMessage());
        }
    }

    public function edit(KategoriProduk $id): View
    { // menampilkan form edit data yang ada di kategori_produk
    	try {
    		// testing data
    		// $edit = 'Kategori Produk Edit'.$id;
    		// dd($edit);

    		$data = KategoriProduk::find($id);
        	return view('skull.admin.kategori_produk_edit', compact('data'));

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

	        KategoriProduk::where('id',$id)->update([
                'nama' => $request->nama,
				'slug' => Str::slug($request->nama),
				'deskripsi' => $request->deskripsi,
            ]);
	        
	        // kembali ke halaman
	        return redirect()->route('kategori.produk.index')
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

    		$data = KategoriProduk::find($id);
        	$data->delete();

	        return redirect()->route('kategori.produk.index')
	                        ->with('success','Product deleted successfully');

    	} catch (\Exception $e) {
    		// Tangani excption yang terjadi
    		dd($e->getMessage());

    	}  
    }
    
}
