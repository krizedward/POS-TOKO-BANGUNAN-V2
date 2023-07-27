<?php

namespace App\Http\Controllers;

// use App\Models\Produk;

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
        
        $menu = 'dashboard';
        $total = 0;
        
        // return dd('dashboard');
        Alert::success('Success', 'You have been successfully logged in.')->autoclose(3000);
        return view('dashboard', 
          compact(
            'menu',
            'total',
          ));

      } catch (\Exception $e) {

        return dd($e->getMessage());
      }
    }
}
