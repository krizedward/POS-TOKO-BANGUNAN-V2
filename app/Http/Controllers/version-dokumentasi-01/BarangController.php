<?php

namespace App\Http\Controllers;

use App\Models\Barang;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BarangController extends Controller
{
    //
    public function index () {
        
        try {

            $menu = 'barang';
            // $data = Barang::paginate(10);
            $data = Barang::all();

            // return dd($data);
            return view('production.barang.index', 
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
