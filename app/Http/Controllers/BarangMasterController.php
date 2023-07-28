<?php

namespace App\Http\Controllers;

use App\Models\BarangMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangMasterController extends Controller
{
    //
    public function index () {
        
        $data = BarangMaster::all();

        return dd($data);
    }
}
