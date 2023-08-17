<?php

namespace Database\Seeders;

use App\Models\BarangStok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangStokTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BarangStok::create([
            'master_barang_id' => 1,
            'ukuran_barang' => '100 x 100',
            'satuan_id' => 1,
            'stok_masuk' => 10,
            'stok_keluar' => 5,
            'status_stok' => 'aman',
        ]);
    }
}
