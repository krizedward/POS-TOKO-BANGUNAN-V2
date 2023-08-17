<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterSatuanBarang;
use Illuminate\Support\Str;

class MasterSatuanBarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MasterSatuanBarang::create([
            'nama' => 'kilogram',
            'slug' => Str::slug('kilogram'),
            'keterangan' => 'keterangan satuan',
        ]);
    }
}
