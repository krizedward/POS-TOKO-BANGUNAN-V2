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
          array('barang_id' => '1' , 'stok_masuk' => '0', 'stok_keluar' => '0'),
          array('barang_id' => '2' , 'stok_masuk' => '0', 'stok_keluar' => '0'),
        );

        foreach ($datas as $data) {
          BarangStok::create([
            'barang_id' => $data['barang_id'],
            'stok_masuk' => $data['stok_masuk'],
            'stok_keluar' => $data['stok_keluar'],
          ]);
        }
    }
}
