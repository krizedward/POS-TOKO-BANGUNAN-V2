<?php

namespace Database\Seeders;

use App\Models\BarangSatuan;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BarangSatuanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BarangSatuan::create([
            'nama' => 'kilogram',
            'slug' => Str::slug('kilogram'),
            'keterangan' => 'keterangan satuan',
        ]);
    }
}
