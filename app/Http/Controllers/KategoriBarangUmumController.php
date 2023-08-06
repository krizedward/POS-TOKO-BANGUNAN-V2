<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarangUmum;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class KategoriBarangUmumController extends Controller
{
    //
    public function index () {
        
        try {

            $menu = 'kategori-barang';
            $data = KategoriBarangUmum::all();
            // $data = Barang::paginate(10);
            return dd($data);
            return view('production.kategori_barang_umum.index', 
            compact(
              'menu',
              'data',
            ));


        } catch (\Exception $e) {

            return dd($e->getMessage());
        } 
        
    }

    public function create () {
        return 'create barang';
    }

    public function store () {
        return 'store';
    }

    public function show () {
        return 'show';
    }

    public function edit () {
        return 'edit';
    }

    public function update () {
        return 'update';
    }

    public function destroy () {
        return 'destroy';
    }
}

