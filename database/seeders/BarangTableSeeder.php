<?php

namespace Database\Seeders;

use App\Models\Barang;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // nguintik eran gak mbok delok aku?
        Barang::create([
            'nama' => 'semen',
            'harga' => '20000',
            'kategori' => 'barang baru',
        ]);

    }
}
