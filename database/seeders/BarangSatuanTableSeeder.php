<?php

namespace Database\Seeders;

// add model
use App\Models\BarangSatuan;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BarangSatuanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = array(
          array('nama' => 'kg', 'keterangan' => 'Kilogram'),
          array('nama' => 'sak', 'keterangan' => 'Kantong'),
          array('nama' => 'm³', 'keterangan' => 'Meter kubik'),
          array('nama' => 'meter', 'keterangan' => 'Meter'),
          array('nama' => 'm²', 'keterangan' => 'Meter persegi'),
          array('nama' => 'unit', 'keterangan' => 'Buah'),
          array('nama' => 'box', 'keterangan' => 'Kotak'),
        );

        foreach ($datas as $data) {
            BarangSatuan::firstOrCreate(
                ['nama' => $data['nama']],
                ['keterangan' => $data['keterangan'], 'slug' => Str::slug($data['keterangan'])]
            );
        }
    }
}
