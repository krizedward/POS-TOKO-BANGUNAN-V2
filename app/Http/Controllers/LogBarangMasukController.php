<?php

namespace App\Http\Controllers;

use App\Models\LogBarangMasuk;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LogBarangMasukController extends Controller
{
    //
    public function index(): View 
    {
        try {

            $menu = 'log-barang-masuk';
            $data = LogBarangMasuk::all();
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.log_barang_masuk.index', 
            
            compact(
              'menu',
              'data',
            ));


        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
    }

    public function show(LogBarangMasuk $id): View 
    {
        try {
            $data = LogBarangMasuk::find($id);
            $menu = 'barang-stok';
            return view('production.log_barang_masuk.show', 
            compact(
                'data',
                'menu',
            ));
        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
    }
}
