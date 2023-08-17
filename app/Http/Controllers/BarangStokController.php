<?php

namespace App\Http\Controllers;

use App\Models\BarangStok;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BarangStokController extends Controller
{
    //
    public function index(): View 
    {
        try {

            $menu = 'barang-stok';
            $data = BarangStok::all();
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.barang_stok.index', 
            compact(
              'menu',
              'data',
            ));


        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
    }

    public function show(BarangStok $id): View 
    {
        try {
            $data = BarangStok::find($id);
            $menu = 'barang-stok';
            return view('production.barang_stok.show', 
            compact(
                'data',
                'menu',
            ));
        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
    }
}
