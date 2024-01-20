<?php

namespace Database\Seeders;

use App\Models\HargaBarangEcer;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HargaBarangEcerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        HargaBarangEcer::create([
            'barang_id' => 1, // barang stok
            'jumlah' => 1,
            'harga' => 1,
        ]);
    }
}
