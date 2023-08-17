<?php

namespace App\Http\Controllers;

use App\Models\LogBarangKeluar;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LogBarangKeluarController extends Controller
{
    //
    public function index(): View 
    {
        try {

            $menu = 'log-barang-keluar';
            $data = LogBarangKeluar::all();
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.log_barang_keluar.index', 
            
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

