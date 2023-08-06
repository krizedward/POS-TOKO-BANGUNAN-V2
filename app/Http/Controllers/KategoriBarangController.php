<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class KategoriBarangController extends Controller
{
    //
    public function index () {
        
        try {

            $menu = 'kategori-barang';
            // $data = KategoriBarang::all();
            $dataGrouped = KategoriBarang::all()->groupBy('kategori_umum_id');
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.kategori_barang.index', 
            compact(
              'menu',
              'dataGrouped',
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
