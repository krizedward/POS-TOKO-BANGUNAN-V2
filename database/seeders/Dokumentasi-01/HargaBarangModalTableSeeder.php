<?php

namespace Database\Seeders;

use App\Models\HargaBarangModal;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HargaBarangModalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        HargaBarangModal::create([
            'barang_id' => 1, // barang stok
            'satuan_id' => 1, // barang stok
            'jumlah' => 1,
            'harga' => 25000,
            // 'tanggal_harga' => 2023-01-01,
        ]);
    }
}
