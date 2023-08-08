<?php

namespace App\Http\Controllers;

use App\Models\BarangFoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangFotoController extends Controller
{
    //
    public function index () {

        $data = BarangFoto::all();

        return dd($data);
    }
}
