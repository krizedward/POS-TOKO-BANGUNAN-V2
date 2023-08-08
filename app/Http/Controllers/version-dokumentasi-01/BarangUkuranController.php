<?php

namespace App\Http\Controllers;

use App\Models\BarangUkuran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangUkuranController extends Controller
{
    //
    public function index () {

      $data = BarangUkuran::all();
      
      return dd($data);
    }
}
