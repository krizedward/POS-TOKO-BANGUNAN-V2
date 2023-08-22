<?php

namespace App\Http\Controllers;

use App\Models\HargaBarangEcer;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class HargaBarangEcerController extends Controller
{
    //
    public function index(): View 
    {
        try {

            $menu = 'harga-barang-modal';
            $data = HargaBarangEcer::all();
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.harga_barang_ecer.index', 
            
            compact(
              'menu',
              'data',
            ));


        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
    }

    public function show(HargaBarangEcer $id): View 
    {
        try {
            $data = HargaBarangEcer::find($id);
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
