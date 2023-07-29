<?php

namespace App\Http\Controllers\API;

use App\Models\BarangStok;
use App\Models\BarangTotalStok;
use App\Models\LogBarangKeluar;
use App\Models\LogBarangMasuk;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangStokController extends Controller
{
    /**
     * Display a listing of the resource.
     * barang_total 
     * barang_id
     * bulan
     * tahun
     * ket_barang (lokasi)
     */
    public function index()
    {
        // data yang ingin ditampilkan
        // $data = BarangStok::all();
        $data = BarangStok::take(5)->get();

        // variable
        $namaBarangArray = [];

        foreach ($data as $item) {
          $namaBarangArray[] = [
            'nama' => $item->barang->nama,
            'stok_masuk' => intval($item->stok_masuk),
            'stok_keluar' => intval($item->stok_keluar),
            'bulan_stok' => $item->bulan_stok,
            'tahun_stok' => $item->tahun_stok,
            'created_at' => $item->barang->created_at,
            'update_at' => $item->barang->updated_at,
          ];
        }

        // Berikan respons terhadap respon diatas
        return response()->json([
          'status' => 200,
          'status_message' => 'sukses',
          'message' => 'Data berhasil ditampilkan',
          'data' => $namaBarangArray,
        ], 200);
    } // berhasil

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try {

        $validator = Validator::make($request->all(), [
          'barang_id' => 'required',
          'banyak' => [
            'required',
            function ($attribute, $value, $fail) {
              if ($value < 0) {
                $fail($attribute.' tidak boleh bernilai minus.');
              }
            },
          ],
          'status' => 'required',
          // Tambahkan aturan validasi lain sesuai kebutuhan
        ]); // validasi
  
        if ($validator->fails()) 
        {
          
          return response()->json([
            'status' => 'error',
            'message' => 'Data yang diterima tidak valid.',
            'errors' => $validator->errors(),
          ], 422);
  
        } else {

          $id = $request->barang_id;
          $statusBarang = $request->status;
          $banyakBarang = $request->banyak;
          // tanggal 
          $tanggal  = now();
          // Memecahkan tanggal menjadi bagian-bagian (tahun, bulan, hari)
          $tanggalArray = explode('-', $tanggal);
          $tahun = $tanggalArray[0];
          $bulan = $tanggalArray[1];
          $hari = $tanggalArray[2];
          // Mendapatkan nama bulan dalam bentuk string
          $namaBulan = date("F", strtotime($tanggal));
          $dataTahun = $tahun;
          $currentTime = Carbon::now();

          $scanTotalBarang = BarangTotalStok::all();

          if($scanTotalBarang->isEmpty())
          {
            BarangTotalStok::create([
              'barang_id' => $request->barang_id,
              'total_banyak' => 0,
              'bulan_stok' => $namaBulan,
              'tahun_stok' => $dataTahun,
            ]);
          } // untuk fase isi data

          $scanDataBulanTB = BarangTotalStok::where('barang_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();
            
          if($scanDataBulanTB->bulan_stok !== $namaBulan
          && $scanDataBulanTB->tahun_stok !== $dataTahun)
          {
            BarangTotalStok::create([
              'barang_id' => $request->barang_id,
              'total_banyak' => 0,
              'bulan_stok' => $namaBulan,
              'tahun_stok' => $dataTahun,
            ]);
          } // kondisi pertama

          if($scanDataBulanTB->tahun_stok !== $dataTahun)
          {
            BarangTotalStok::create([
              'barang_id' => $request->barang_id,
              'total_banyak' => 0,
              'bulan_stok' => $namaBulan,
              'tahun_stok' => $dataTahun,
            ]);
          } // kondisi kedua

          if($scanDataBulanTB->bulan_stok !== $namaBulan)
          {
            BarangTotalStok::create([
              'barang_id' => $request->barang_id,
              'total_banyak' => 0,
              'bulan_stok' => $namaBulan,
              'tahun_stok' => $dataTahun,
            ]);
          } // kondisi ketiga

          // jika nilai barang stok kosong (stok keluar kosong)
          // maka respon nilai keluar tidak bisa masuk
          $scanBarangStok = BarangStok::where('barang_id', $id)->first();
          $scanBarangTotalStok = BarangTotalStok::where('barang_id', $id)
              ->orderBy('created_at', 'desc')
              ->first();
          $prosesJumlah = $scanBarangTotalStok->total_stok - $banyakBarang;

          if ($statusBarang ==  'masuk') // jika data masuk
          {

            LogBarangMasuk::create([
              'barang_id' => $request->barang_id,
              'banyak' => $request->banyak,
              'waktu' => $tanggal,
              'created_at' => $currentTime,
              'updated_at' => $currentTime,
            ]);
            // ambil barang stok
            $barangStok = BarangStok::where('barang_id', $id)->first();
            // ambil barang total stok (karena hanya ada satu id)
            $barangTotalStok = BarangTotalStok::where('barang_id', $id)
              ->orderBy('created_at', 'desc')
              ->first();
            // ambil log barang masuk
            $barangMasuk = LogBarangMasuk::latest()->first();
            $jumlahMasukSebelumnya = LogBarangMasuk::where('barang_id', $id)->sum('banyak');
            
            BarangStok::where('barang_id',$id)->update([
              'stok_masuk' => $barangStok->stok_masuk + $banyakBarang,
            ]);

            BarangTotalStok::where('barang_id',$id)
            ->where('bulan_stok', $namaBulan) // Bulan bukan 'July'
            ->where('tahun_stok', $dataTahun)
            ->update([
              'total_banyak' => $barangTotalStok->total_banyak + $banyakBarang,
            ]);

            $barangStok = BarangStok::where('barang_id', $id)->first();
            // $barangTotalStok = BarangTotalStok::where('barang_id', $id)->first();

            $barangTotalStok = BarangTotalStok::where('barang_id', $id)
              ->orderBy('created_at', 'desc')
              ->first();
            
            $data = [
              'nama' => $barangStok->barang->nama,
              'stok_masuk' => $barangStok->stok_masuk,
              'stok_keluar' => $barangStok->stok_keluar,
              'total_banyak' => $barangTotalStok->total_banyak,
              'bulan_stok' => $barangTotalStok->bulan_stok,
              'tahun_stok' => $barangTotalStok->tahun_stok,
              'barang_keluar' => [
                'banyak' => $barangMasuk->banyak,
                'waktu' => $barangMasuk->waktu,
              ]
            ];

          }

          else if ($statusBarang ==  'keluar' && $scanBarangStok->stok_masuk != 0
          && $scanBarangTotalStok->total_banyak > 0 && $prosesJumlah <= 0) // jika data keluar
          {
            LogBarangKeluar::create([
              'barang_id' => $request->barang_id,
              'banyak' => $request->banyak,
              'waktu' => $tanggal,
              'created_at' => $currentTime,
              'updated_at' => $currentTime,
            ]);
            // ambil barang stok
            $barangStok = BarangStok::where('barang_id', $id)->first();
            // ambil barang total stok
            $barangTotalStok = BarangTotalStok::where('barang_id', $id)
              ->orderBy('created_at', 'desc')
              ->first();
            // ambil log barang masuk
            $barangMasuk = LogBarangMasuk::latest()->first();
            $jumlahMasukSebelumnya = LogBarangMasuk::where('barang_id', $id)->sum('banyak');
            
            BarangStok::where('barang_id',$id)->update([
              'stok_keluar' => $barangStok->stok_keluar + $banyakBarang,
            ]);

            BarangTotalStok::where('barang_id',$id)
            ->where('bulan_stok', $namaBulan) // Bulan bukan 'July'
            ->where('tahun_stok', $dataTahun)
            ->update([
              'total_banyak' => $barangTotalStok->total_banyak - $banyakBarang,
            ]); // mengubah nilai total banyak

            $barangStok = BarangStok::where('barang_id', $id)->first();
            // $barangTotalStok = BarangTotalStok::where('barang_id', $id)->first();

            $barangTotalStok = BarangTotalStok::where('barang_id', $id)
              ->orderBy('created_at', 'desc')
              ->first();
            
            $data = [
              'nama' => $barangStok->barang->nama,
              'stok_masuk' => $barangStok->stok_masuk,
              'stok_keluar' => $barangStok->stok_keluar,
              'total_banyak' => $barangTotalStok->total_banyak,
              'bulan_stok' => $barangTotalStok->bulan_stok,
              'tahun_stok' => $barangTotalStok->tahun_stok,
              'barang_keluar' => [
                'banyak' => $barangMasuk->banyak,
                'waktu' => $barangMasuk->waktu,
              ]
            ];

          }

          else {
            return response()->json([
              'status' => 'error',
              'message' => 'Ada kesalahan data untuk diproses',
            ], 500);
          }

          if ($statusBarang ==  'keluar_old') // jika data keluar
          {
            LogBarangKeluar::create([
              'barang_id' => $request->barang_id,
              'banyak' => $request->banyak,
              'waktu' => $tanggal,
              'created_at' => $currentTime,
              'updated_at' => $currentTime,
            ]);

            $barangTotalStok = BarangTotalStok::where('barang_id', $id)->first();

            if($barangTotalStok === null || $barangTotalStok->bulan_stok !== $namaBulan) {
              BarangTotalStok::create([
                'barang_id' => $request->barang_id,
                'total_banyak' => 0,
              ]);
            }

            $barangStok = BarangStok::where('barang_id', $id)->first();
            $barangTotalStok = BarangTotalStok::where('barang_id', $id)->first();
            $barangKeluar = LogBarangKeluar::latest()->first();
            $jumlahMasukSebelumnya = LogBarangMasuk::where('barang_id', $id)->sum('banyak');
            
            BarangStok::where('barang_id',$id)->update([
              'stok_keluar' => $barangStok->stok_keluar + $banyakBarang,
            ]);

            BarangTotalStok::where('barang_id',$id)->update([
              'total_banyak' => $barangTotalStok->total_banyak - $banyakBarang,
              'bulan_stok' => $namaBulan,
              'tahun_stok' => $tahun,
            ]);

            $barangStok = BarangStok::where('barang_id', $id)->first();
            $barangTotalStok = BarangTotalStok::where('barang_id', $id)->first();

            $data = [
              'nama' => $barangStok->barang->nama,
              'stok_masuk' => $barangStok->stok_masuk,
              'stok_keluar' => $barangStok->stok_keluar,
              'total_banyak' => $barangTotalStok->total_banyak,
              'bulan_stok' => $barangTotalStok->bulan_stok,
              'tahun_stok' => $barangTotalStok->tahun_stok,
              'barang_keluar' => [
                'banyak' => $barangKeluar->banyak,
                'waktu' => $barangKeluar->waktu,
              ]
            ];
          } // memasukan data barang keluar

          // Berikan respons sukses
          return response()->json([
            'status' => 201,
            'status_message' => 'sukses',
            'message' => 'Data berhasil disimpan',
            'data' => $data,
          ], 201);
  
        }

      } catch (\Exception $e) {

        // Tangani exception yang terjadi
        return response()->json([
          'status' => 'error',
          'message' => 'Gagal menyimpan data',
          'error' => $e->getMessage()
        ], 500);

      } 
    } // berhasil

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        //
        try {

          $data = BarangStok::findOrFail($id);
          $tanggalValue = $request->query('tanggal');
          $bulanValue = $request->query('bulan');
          $tahunValue = $request->query('tahun');

          // Menggabungkan data menjadi satu data tanggal yang lengkap
          $tanggalLengkap = Carbon::create($tahunValue, $bulanValue, $tanggalValue);

          // Mengubah format tanggal menjadi format yang diinginkan (misalnya: 'Y-m-d')
          $tanggalFormatYMD = $tanggalLengkap->format('Y-m-d');

          // Mengubah format tanggal menjadi format lain (misalnya: 'd-m-Y')
          $tanggalFormatDMY = $tanggalLengkap->format('d-m-Y');

          //variable
          $arrayData = [];

          // Mengisi arrayData dengan atribut-atribut yang diinginkan
          $arrayData[] = [
            'nama' => $data->barang->nama,
            'tanggal' => $tanggalValue,
            'bulan' => $bulanValue,
            'tahun' => $tahunValue,
            // Tambahkan atribut lain yang ingin Anda tampilkan
          ];

          $tanggalWaktu = '2023-07-21T02:37:28.000000Z';

          // Menggunakan Carbon untuk memisahkan tanggal
          $tanggal = Carbon::parse($tanggalWaktu)->toDateString();

          // $users = BarangStok::whereDate('created_at', $tanggalFormatYMD)->get();
          $users = BarangStok::where('barang_id', '2')->get();
  
          return response()->json([
            'message' => 'Data ditemukan',
            'data' => $users,
            'array_data' => $arrayData,
          ], 200);

        } catch (\Exception $e) {

          return response()->json([
            'message' => 'Data tidak ditemukan'
          ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            // $barang = BarangStok::findOrFail($id);
    
            // $validatedData = $request->validate([
            //     'nama' => 'required',
            //     'keterangan' => 'required',
            // ]);

            // BarangStok::create([
            //   'barang_id' => 1,
            //   'stok_masuk' => 0,
            //   'stok_keluar' => 0,
            //   'total_banyak' => 0,
            //   'bulan_stok' => 'maret',
            //   'tahun_stok' => '2023',
            // ]);

            BarangStok::where('id',$id)->update([
              // 'nama' => $request->nama,
              // 'slug' => Str::slug($request->nama),
              // 'deskripsi' => $request->deskripsi,
              // 'nama' => $request->nama,
              // 'slug' => Str::slug($request->nama),
              'barang_id' => 1,
              'stok_masuk' => 0,
              'stok_keluar' => 0,
              'total_banyak' => 0,
              'bulan_stok' => 'maret',
              'tahun_stok' => '2023',
            ]);
    
            // $barang->nama = $request->input('nama');
            // $barang->keterangan = $request->input('keterangan');
            // Update atribut lainnya jika diperlukan
    
            // $barang->save();
    
            return response()->json([
              'message' => 'Data berhasil diupdate',
              // 'data' => $barang
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
          // $data = BarangStok::find($id);
        	// $data->delete();
          
          $barang = BarangStok::findOrFail($id);
          $barang->delete();
          
          return response()->json([
              'message' => 'Data berhasil dihapus'
          ], 204);

        } catch (\Exception $e) {
            
          return response()->json([
            'message' => 'Data tidak ditemukan'
          ], 404);
        }
    }
}