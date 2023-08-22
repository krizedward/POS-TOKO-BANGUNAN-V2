<?php

namespace Database\Seeders;

use App\Models\HargaBarangLusin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HargaBarangLusinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        HargaBarangLusin::create([
            'barang_id' => 1, // barang stok
            'jumlah' => 1,
            'harga' => 1,
        ]);
    }
}
