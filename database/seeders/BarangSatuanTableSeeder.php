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
            'keterangan' => 'untuk ukuran satuan',
        ]);

        BarangSatuan::create([
            'nama' => 'gram',
            'slug' => Str::slug('gram'),
            'keterangan' => 'untuk ukuran satuan',
        ]);

        BarangSatuan::create([
            'nama' => 'kubik',
            'slug' => Str::slug('kubik'),
            'keterangan' => 'untuk bata ringan',
        ]);

        BarangSatuan::create([
            'nama' => 'meter',
            'slug' => Str::slug('meter'),
            'keterangan' => 'untuk bata ringan',
        ]);

        BarangSatuan::create([
            'nama' => 'sak',
            'slug' => Str::slug('sak'),
            'keterangan' => 'untuk semen',
        ]);

        BarangSatuan::create([
            'nama' => 'karung',
            'slug' => Str::slug('karung'),
            'keterangan' => 'untuk semen',
        ]);

        BarangSatuan::create([
            'nama' => 'rit',
            'slug' => Str::slug('rit'),
            'keterangan' => 'untuk semen',
        ]);

        BarangSatuan::create([
            'nama' => 'lonjor',
            'slug' => Str::slug('lonjor'),
            'keterangan' => 'untuk besi',
        ]);

        BarangSatuan::create([
            'nama' => 'volume',
            'slug' => Str::slug('volume'),
            'keterangan' => 'untuk besi',
        ]);

        BarangSatuan::create([
            'nama' => 'volume',
            'slug' => Str::slug('volume'),
            'keterangan' => 'untuk cat',
        ]);

        BarangSatuan::create([
            'nama' => 'liter',
            'slug' => Str::slug('liter'),
            'keterangan' => 'untuk cat',
        ]);

        BarangSatuan::create([
            'nama' => 'milliliter',
            'slug' => Str::slug('milliliter'),
            'keterangan' => 'untuk cat',
        ]);
    }
}
