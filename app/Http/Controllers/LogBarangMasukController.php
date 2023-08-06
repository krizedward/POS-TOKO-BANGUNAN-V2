<?php

namespace App\Http\Controllers;

use App\Models\LogBarangMasuk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogBarangMasukController extends Controller
{
    //
    public function index () {
        $data = LogBarangMasuk::all();
        $menu = 'log-barang-masuk';

        // return dd($data);
        return view('production.log_barang_masuk.index',
        compact(
            'menu',
            'data',
        ));
    }
}
