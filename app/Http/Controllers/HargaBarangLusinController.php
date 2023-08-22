<?php

namespace App\Http\Controllers;

use App\Models\HargaBarangLusin;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class HargaBarangLusinController extends Controller
{
    //
    public function index(): View 
    {
        try {

            $menu = 'harga-barang-modal';
            $data = HargaBarangLusin::all();
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.harga_barang_lusin.index', 
            
            compact(
              'menu',
              'data',
            ));


        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
    }

    public function show(HargaBarangLusin $id): View 
    {
        try {
            $data = HargaBarangLusin::find($id);
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
