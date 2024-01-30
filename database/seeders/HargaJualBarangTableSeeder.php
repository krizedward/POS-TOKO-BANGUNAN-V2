<?php

namespace Database\Seeders;

use App\Models\HargaJualBarang;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HargaJualBarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        HargaJualBarang::create([
            'barang_id' => 1, // barang stok
            'satuan_id' => 1, // barang stok
            'jumlah' => 1,
            'harga' => 15000,
            // 'tanggal_harga' => 2023-01-01,
        ]);
    }
}
