<?php

namespace App\Http\Controllers;

use App\Models\LogBarangKeluar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogBarangKeluarController extends Controller
{
    //
    public function index () {
        $data = LogBarangKeluar::all();
      
        return dd($data); 
    } 
}
