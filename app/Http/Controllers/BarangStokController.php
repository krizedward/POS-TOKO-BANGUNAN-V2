<?php

namespace App\Http\Controllers;

use App\Models\BarangStok;

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

            $menu = 'barang-stok';
            $data = BarangStok::all();
            // $data = Barang::paginate(10);
            // return dd($data);
            return view('production.barang_stok.index', 
            compact(
              'menu',
              'data',
            ));


        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
    }

    public function create()
    {
        try {

            // membuat fitur tambah produk
            $menu = 'barang-stok';
            // return "tambah barang stok";
            return view('production.barang_stok.create',
            compact(
                'menu',
            ));

        } catch(\Exception $e) {
            
            return dd($e->getMessage());
        }
    }

    public function store(Request $request): RedirectResponse
    {
        // return 'berhasil';
        // $menu = 'barang-stok';
        // $data = BarangStok::all();
        // // $data = Barang::paginate(10);
        // // return dd($data);
        // return view('production.barang_stok.index', 
        // compact(
        //     'menu',
        //     'data',
        // ));

        // ambil barang stok
        // $barangStok = BarangStok::where('maste_barang_id', $id)->first();
        // proses
        BarangStok::create([
            'master_barang_id' => '1',
            'ukuran_barang' => '200 x 130',
            'satuan_id' => '1',
        ]);
        // BarangStok::where('maste_barang_id',$id)->update([
        //     'stok_masuk' => $barangStok->stok_masuk + 1,
        //     'stok_keluar' => $barangStok->stok_masuk + 1,
        // ]);

        Alert::success('Success', 'Telah Berhasil Menambahkan Data Master satuan Barang.');

        return Redirect::route('barang-stok.index');
    }

    public function show(BarangStok $id): View 
    {
        try {
            $data = BarangStok::find($id);
            $menu = 'barang-stok';
            return view('production.barang_stok.show', 
            compact(
                'data',
                'menu',
            ));
        } catch (\Exception $e) {

            return dd($e->getMessage());
        }
    }
}
