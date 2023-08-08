<?php

namespace App\Http\Controllers;

use App\Models\ProdukHargaModal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProdukHargaModalController extends Controller
{
    //
    public function edit($id): View
    {
      try {

    	$data = ProdukHargaModal::findOrFail($id);
        $menu = 'produk';

        return view('harga_modal.edit', 
        compact(
          'data',
          'menu',
        ));

    	} catch (\Exception $e) {
    		// Tangani exception yang terjadi
        	dd($e->getMessage());
    	
    	}
    }

    public function update(Request $request, $id): RedirectResponse
    {
      try {
        
        ProdukHargaModal::where('id',$id)->update([
          'harga' => $request->harga,
          'jumlah' => $request->jumlah,
          'tanggal_harga' => now(),
        ]);

        Alert::success('Success', 'Telah Berhasil Mengubah Data Produk.');

        return Redirect::route('produk.show',[$id]);

      } catch (\Exception $e) {
        // Tangani exception yang terjadi
        // $result = null;
        dd($e->getMessage());
		  }
    }
}
