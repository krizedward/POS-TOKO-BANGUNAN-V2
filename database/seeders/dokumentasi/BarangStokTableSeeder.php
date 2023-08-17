<?php

namespace Database\Seeders;

// add model
use App\Models\BarangStok;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangStokTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = array(
          array('master_barang_id' => '1' , 'stok_masuk' => '0', 'stok_keluar' => '0'),
          array('master_barang_id' => '2' , 'stok_masuk' => '0', 'stok_keluar' => '0'),
        );

        // foreach ($datas as $data) {
        //   BarangStok::create([
        //     // 'barang_id' => $data['barang_id'],
        //     // 'stok_masuk' => $data['stok_masuk'],
        //     // 'stok_keluar' => $data['stok_keluar'],

        //     'master_barang_id' => $data['master_barang_id'],
        //     'ukuran_barang' => '10x10',
        //     'satuan_id' => '1',
        //     'stok_masuk' => $data['stok_masuk'],
        //     'stok_keluar' => $data['stok_keluar'],
        //     'status_stok' => 'Masih Ada',
        //   ]);
        // }

        BarangStok::create([
          'master_barang_id' => 1,
          'ukuran_barang' => '10x10',
          'satuan_id' => 2,
          'stok_masuk' => 0,
          'stok_keluar' => 0,
          'status_stok' => 'Masih Ada',
        ]);
    }
}
