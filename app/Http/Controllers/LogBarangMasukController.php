<?php

namespace App\Http\Controllers;

use App\Models\LogBarangMasuk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogBarangMasukController extends Controller
{
    //
    public function index () {
        $startDate = date('Y-m-d', mktime(0,0,0, date('m'), 1, date('Y')));
        $endDate = date('Y-m-d');
        $data = LogBarangMasuk::all();
        $menu = 'log-barang-masuk';

        // return dd($data);
        return view('production.log_barang_masuk.index',
        compact(
            'menu',
            'data',
            'startDate', 
            'endDate',
        ));
    }
}
