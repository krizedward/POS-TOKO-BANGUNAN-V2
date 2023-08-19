<?php

namespace App\Http\Controllers;

// use App\Models\Produk;
use App\Models\LogBarangMasuk;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DashboardController extends Controller
{
    //
    public function index() 
    {
      // $menu = 'dashboard';
      // $total = Produk::count();
      
      // return view('dashboard',
      //   compact(
      //     'menu',
      //     'total',
      // ));
      try {
        // untuk tampilan tanggal
        $startDate = date('Y-m-d', mktime(0,0,0, date('m'), 1, date('Y')));
        $endDate = date('Y-m-d');
        $data = LogBarangMasuk::all();

        // variable
        $menu = 'dashboard';
        $total = 0;
        
        // return dd('dashboard');
        Alert::success('Success', 'You have been successfully logged in.')->autoclose(3000);
        return view('dashboard', 
          compact(
            'menu',
            'total',
            'startDate', 
            'endDate',
          ));

      } catch (\Exception $e) {

        return dd($e->getMessage());
      }
    }
}
