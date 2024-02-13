<?php

namespace App\Http\Controllers\API;

// Model
use App\Models\Barang;
use App\Models\BarangGambar;
use App\Models\HargaJualBarang;
use App\Models\HargaTokoBarang;
use App\Models\HargaModalBarang;
use App\Models\StokBarangGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * done
     * 
     */
    public function index()
    {
        //
        // return 'berhasil';
        $data = [];

        $barangs = Barang::leftJoin('barang_gambar', 'barang.id', '=', 'barang_gambar.barang_id')
            ->leftJoin('harga_jual_barang', 'barang.id', '=', 'harga_jual_barang.barang_id')
            ->leftJoin('harga_toko_barang', 'barang.id', '=', 'harga_toko_barang.barang_id')
            ->leftJoin('harga_modal_barang', 'barang.id', '=', 'harga_modal_barang.barang_id')
            ->leftJoin('stok_barang_gudang', 'barang.id', '=', 'stok_barang_gudang.barang_id')
            ->select(
                'barang.id', 
                'barang.nama', 
                'barang.slug', 
                'barang_gambar.filename', 
                'barang_gambar.path',
                'harga_jual_barang.harga as harga_jual', // Perubahan nama kolom)
                'harga_toko_barang.harga as harga_toko', // Perubahan nama kolom)
                'harga_modal_barang.harga as harga_modal',
                'stok_barang_gudang.stok_masuk as stok_gudang',)
            ->get();

        foreach ($barangs as $barang) {
            // $path = Storage::path("public\\gambar\\{$barang->filename}");

            $data[] = [
                'id' => $barang->id,
                'nama' => $barang->nama,
                'slug' => $barang->slug,
                'gambar' => $barang->filename,
                'gambar_path' => $barang->path,
                'harga_jual' => $barang->harga_jual ?? 0,
                'harga_toko' => $barang->harga_toko ?? 0,
                'harga_modal' => $barang->harga_modal ?? 0,
                // 'stok_toko' => 0,
                'stok_gudang' => $barang->stok_gudang ?? 0,
                // 'gambar' => [
                //     'filename' => $barang->filename,
                //     'path' => $path,
                // ],
            ];
        }

        return response()->json([
            'status' => 200,
            'data' => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * done
     * 
     */
    // public function store(Request $request)
    // {
    //     //
    //     // validasi
    //     // $request->validate([
    //     //     'nama' => 'required',
    //     // ]);
    //     // create
    //     $data = Barang::create([
    //         'nama' => $request->nama,
    //         'slug' => Str::slug($request->nama),
    //     ]);

    //     if ($request->hasFile('gambar')) {
    //         // Assuming 'gambar' is the file input name
    //         $gambarFile = $request->file('gambar');
    //         $filename = $gambarFile->getClientOriginalName(); // You may want to customize the filename
    
    //         // Save image details to barang_gambar table
    //         $barang->barangGambars()->create([
    //             'filename' => $filename,
    //             'path' => $gambarFile->storeAs('gambar', $filename, 'public'), // Adjust the storage path as needed
    //         ]);

    //         BarangGambar::create([
    //             'barang_id' => $data->id,
    //             'filename' => $request->gambar,
    //             'path' => $request->gambar,
    //         ]);
    //     }

    //     // respon
    //     return response()->json([
    //         'status' => 201,
    //         'status_message' => 'success',
    //         'text_message' => 'Data berhasil disimpan',
    //         'data' => $data,
    //     ], 201);
    // }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama' => 'required',
            // 'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ]);

        // Buat Barang baru
        $barang = Barang::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        $idBarang = $barang->id;

        HargaModalBarang::create([
            'barang_id' => $idBarang,
            'jumlah' => 0,
            'harga' => 0,
        ]);

        HargaJualBarang::create([
            'barang_id' => $idBarang, 
            // 'satuan_id',
            'jumlah' => 0,
            'harga' => 0,
            // 'tanggal_harga',
        ]);

        HargaTokoBarang::create([
            'barang_id' => $idBarang,
            'jumlah' => 0,
            'harga' => 0,
        ]);

        StokBarangGudang::create([
            'barang_id' => $idBarang,
            // 'ukuran_barang' => '',
            // 'satuan_id' => '',
            'stok_masuk' => 0,
            'stok_keluar' => 0,
            // 'status_stok',
        ]);

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            // Ambil file gambar dari request
            $gambarFile = $request->file('gambar');

            // Tentukan nama file
            $filename = $gambarFile->getClientOriginalName();

            // Simpan informasi gambar ke tabel barang_gambar
            $barang->barangGambars()->create([
                'barang_id' => $barang->id,
                'filename' => $filename,
                'path' => $gambarFile->storeAs('gambar', $filename, 'public'), // Sesuaikan path penyimpanan
            ]);
        }

        // Simpan informasi gambar ke tabel BarangGambar (jika diperlukan)
        // BarangGambar::create([
        //     'barang_id' => $barang->id,
        //     'filename' => $filename, // Sesuaikan dengan kolom yang dibutuhkan
        //     'path' => $gambarFile->storeAs('gambar', $filename, 'public'), // Sesuaikan path penyimpanan
        // ]);

        // Respon
        return response()->json([
            'status' => 201,
            'status_message' => 'success',
            'text_message' => 'Data berhasil disimpan',
            'data' => $barang,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * done
     * 
     */
    public function show($id)
    {
        //
        $barang  = Barang::where('id',$id)->first();
        
        $data = [
            'id' => $barang->id,
            'nama' => $barang->nama,
            'slug' => $barang->slug,
            // Tambahkan data lain yang ingin ditampilkan di sini
        ];

        return response()->json([
            'status' => 200,
            'data' => 'detail',
            'data' => $data,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * done
     * 
     */
    public function update(Request $request, $id)
    {
        // validate
        // $request->validate([
        //     'nama' => 'reqired',
        // ]);

        Barang::where('id',$id)->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            // 'harga' => $request->harga,
            // 'kategori' => $request->kategori,
            // 'slug' => Str::slug($request->nama),
            // 'deskripsi' => $request->deskripsi,
            // 'nama' => $request->nama,
            // 'slug' => Str::slug($request->nama),
            // 'nickname' => $request->nickname,
        ]);

        // Update atau Buat data HargaJualBarang
        HargaJualBarang::updateOrCreate(
            ['barang_id' => $id], // Kunci pencarian
            ['harga' => $request->harga_jual] // Data untuk di-update atau di-create
            // Tambahkan kolom lain jika diperlukan
        );

        HargaTokoBarang::updateOrCreate(
            ['barang_id' => $id], // Kunci pencarian
            ['harga' => $request->harga_toko] // Data untuk di-update atau di-create
            // Tambahkan kolom lain jika diperlukan
        );

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil mengubah data',
            // 'data' => $data,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * done
     * 
     */
    public function destroy($id)
    {
        //
        $data = Barang::findOrFail($id);
        $data->delete();

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil dihapus'
        ], 200);
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
    	$data = Barang::onlyTrashed()->get();
    	// return view('guru_trash', ['guru' => $guru]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data yang dihapus sementara',
            'data' => $data,
        ], 200);
    }

    public function restore($id)
    {
        // mengampil data guru yang sudah dihapus
        $data = Barang::onlyTrashed()->where('id',$id);
    	$data->restore();
    	// $data = Barang::onlyTrashed()->get();
    	// return view('guru_trash', ['guru' => $guru]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil dipulihkan',
            // 'data' => $data,
        ], 200);
    }

    public function allrestore()
    {
        // mengampil data guru yang sudah dihapus
        $data = Barang::onlyTrashed();
    	$data->restore();
    	// $data = Barang::onlyTrashed()->get();
    	// return view('guru_trash', ['guru' => $guru]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data berhasil dipulihkan',
            // 'data' => $data,
        ], 200);
    }

    public function forcerestore()
    {
        // mengampil data guru yang sudah dihapus
        $data = Barang::onlyTrashed();
    	$data->forceDelete();
    	// $data = Barang::onlyTrashed()->get();
    	// return view('guru_trash', ['guru' => $guru]);

        return response()->json([
            'status' => 200,
            'status_message' => 'success',
            'text_message' => 'Data hilang secara permanen',
            // 'data' => $data,
        ], 200);
    }
}