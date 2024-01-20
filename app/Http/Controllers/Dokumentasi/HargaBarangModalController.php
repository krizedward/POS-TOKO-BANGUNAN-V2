<?php

namespace App\Http\Controllers;

// use App\Models\MasterBarang;
// use App\Models\MasterSatuanBarang;
// use App\Models\MasterKategoriBarang;
use App\Models\HargaBarangModal;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class HargaBarangModalController extends Controller
{
    //
    public function index(): View 
    {
        try {

            $menu = 'harga-barang-modal';
            $data = HargaBarangModal::all();
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.harga_barang_modal.index', 
            
            compact(
              'menu',
              'data',
            ));


        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
    }

    public function show(LogBarangKeluar $id): View 
    {
        try {
            $data = LogBarangKeluar::find($id);
            $menu = 'barang-stok';
            return view('production.log_barang_keluar.show', 
            compact(
                'data',
                'menu',
            ));
        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
    }
}
