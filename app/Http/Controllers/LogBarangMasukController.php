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
      
        return dd($data); 
    } 
}
