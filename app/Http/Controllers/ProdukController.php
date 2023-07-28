<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukHargaModal;
use App\Models\ProdukHargaEcer;
use App\Models\ProdukHargaToko;
use App\Models\ProdukHargaLusin;
// use App\Models\ProdukStok;
use App\Models\ProdukGambar;
use App\Models\ProdukSatuan;
use App\Models\KategoriProduk;
use App\Models\KategoriUmumProduk;
use App\Models\KategoriBarang;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProdukController extends Controller
{
    //
    public function index(): View
    { // menampilkan data yang ada di kategori_produk
      try {
      	// testing data
      	// $data = Produk::all();
      	// $data = Produk::take(5)->get();
      	$data = Produk::paginate(10);
        $menu = 'produk';
      	// $data = KategoriProduk::all();
      	// dd($index);
      	return view('produk.index', compact('data','menu'));
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
          $menu = 'produk';
          $KategoriUmumProduk = KategoriUmumProduk::all();
          $KategoriBarang = KategoriBarang::all();
        	// $ProdukSatuan = ProdukSatuan::all();

          return view('produk.create', 
          compact(
            'menu',
            'KategoriUmumProduk',
            'KategoriBarang',
            // 'ProdukSatuan',
          ));

        } catch (\Exception $e) {
        	// Tangani exception yang terjadi
        	dd($e->getMessage());

        }
    }

    public function store(Request $request): RedirectResponse
    { // menyimpan data form yang ada di kategori_produk
        try {
        	// validasi data form
        	// $request->validate([
	        //     'nama' => 'required|min:1',
	        //     'deskripsi' => 'required|min:10',
	        // ]);
	        
	        // menyimpan data
	        // Produk::create([
	        	// old
            // 'kode_id' => "KP",
            // 'kode_nomor' => Str::padLeft(mt_rand(1, 99999), 5, '0'),
            // 'nama' => $request->nama,
            // 'slug' => Str::slug($request->nama),
            // 'deskripsi' => $request->deskripsi,
            // new
            // 'nama_produk' => $request->data,
            // 'deskripsi' => $request->deskripsi,
            // 'harga' => $request->harga,
            // 'stok' => $request->stok,
            // 'stok_minimum' => $request->stok_minimum,
            // 'kategori' => $request->kategori,
            // 'supplier' => $request->supplier,
            // 'tanggal_pembelian_terakhir' => $request->tanggal_pembelian_terakhir,
            // 'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            // new
          //   'nama' => $request->nama,
          //   'kategori_id' => 1,
          //   'satuan_id' => 1,
	        // ]);

          Produk::create([
            // 'kode_id' => 'AA',
            // 'kode_nomor' => 0,
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'slug' => Str::slug($request->nama),
	        ]);

          $lastId = Produk::latest()->first()->id;

          // ProdukStok::create([
          //   'produk_id' => $lastId,
          //   'jumlah'=> $request->jumlah,
          // ]);

          ProdukHargaModal::create([
            'produk_id' => $lastId,
            'harga'=> $request->modal,
            'jumlah'=> 0,
          ]);

          ProdukHargaEcer::create([
            'produk_id' => $lastId,
            'harga' => 0,
            'jumlah' => 0,
            // 'tanggal_harga' => $request->,
          ]);

          ProdukHargaToko::create([
            'produk_id' => $lastId,
            'harga' => 0,
            'jumlah' => 0,
            // 'tanggal_harga' => $request->,
          ]);

          ProdukHargaLusin::create([
            'produk_id' => $lastId,
            'harga' => 0,
            'jumlah' => 0,
            // 'tanggal_harga' => $request->,
          ]);
          
          ProdukGambar::create([
            'produk_id' => $lastId,
          ]);
	        // kembali ke halaman
	        // return redirect()->route('kategori.suplier.index')
	        //                 ->with('success','Product created successfully.');
          
          Alert::success('Success', 'Telah Berhasil Menambahkan Data Produk.');

          return Redirect::route('produk.index');

        } catch (\Exception $e) {
        	// Tangani exception yang terjadi
        	dd($e->getMessage());

        }
    }

    public function show(Produk $id): View
    { // menampilkan data berdasarkan id yang ada di kategori_produk
        try {
        	// testing data
        	// $show = 'Kategori Produk Show Form '.$id;
        	// dd($show);
        	$data = Produk::find($id);
          $menu = 'produk';
        	return view('produk.show', compact('data','menu'));

        } catch (\Exception $e) {
        	// Tangani exception yang terjadi
        	dd($e->getMessage());
        }
    }

    public function edit($id): View
    { // menampilkan form edit data yang ada di kategori_produk
    	try {
    		// testing data
    		// $edit = 'Kategori Produk Edit'.$id;
    		// dd($edit);

    		$data = Produk::findOrFail($id);
        $menu = 'produk';
        $KategoriProdukDetail = KategoriProdukDetail::all();
        $ProdukSatuan = ProdukSatuan::all();

        // return dd($data[0]->satuan_id);

        return view('produk.edit', 
        compact(
          'data',
          'menu',
          'KategoriProdukDetail',
          'ProdukSatuan',
        ));

    	} catch (\Exception $e) {
    		// Tangani exception yang terjadi
        	dd($e->getMessage());
    	
    	}
    }

    public function update(Request $request, $id): RedirectResponse
    { // menyimpan data form edit yang ada di kategori_produk
    	try {

	        // $this->validate($request, [
	        //   'nama' => 'required',
	        //   'deskripsi' => 'required',
	        // ]);

	        Produk::where('id',$id)->update([
            // 'nama' => $request->nama,
				    // 'slug' => Str::slug($request->nama),
				    // 'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
          ]);
	        
	        // kembali ke halaman
	        // return redirect()->route('kategori.suplier.index')
	        //                 ->with('success','Product created successfully.');
          
          Alert::success('Success', 'Telah Berhasil Mengubah Data Produk.');

          return Redirect::route('produk.index');


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

    		  $data = Produk::find($id);
        	$data->delete();

	        // return redirect()->route('kategori.suplier.index')
	        //                 ->with('success','Product deleted successfully');

          Alert::success('Success', 'Telah Berhasil Menghapus Data Produk.');

          return Redirect::route('produk.index');

    	} catch (\Exception $e) {
    		// Tangani excption yang terjadi
    		dd($e->getMessage());

    	}  
    }
    
}