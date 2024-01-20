<?php

namespace Database\Seeders;

// add model
use App\Models\OrderBarang;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderBarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        OrderBarang::create([
            'barang_id' => 1,
            'banyak' => 1,
            'harga' => 50000,
            'jumlah' => 53230*3,
        ]);
    }
}
