<?php

namespace App\Http\Controllers;

use App\Models\BarangStok;
use App\Models\LogBarangKeluar;
use App\Models\LogBarangMasuk;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BarangStokController extends Controller
{
    //
    public function index(): View 
    {
      try {
        
        $data = BarangStok::all();
        return dd($data);

      } catch (\Exception $e) {
        
        dd($e->getMessage());
      }
      
    }

    public function create(): View
    {
      //
      return view('production.barang_stok.create');
    }

    public function store(): RedirectResponse
    {
      try {
        
        BarangStok::create([
          'barang_id' => 1,
          'stok_masuk' => 0,
          'stok_keluar' => 0,
          'total_banyak' => 0,
          'bulan_stok' => 'maret',
          'tahun_stok' => '2023',
        ]);

        LogBarangMasuk::create([
          'barang_id' => 1,
          'banyak' => 0,
          'waktu' => '2023-01-01',
        ]);

        LogBarangKeluar::create([
          'barang_id' => 1,
          'banyak' => 1,
          'waktu' => '2023-01-01',
        ]);

      } catch (\Exception $e) {
        
        dd($e->getMessage());
      }
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
