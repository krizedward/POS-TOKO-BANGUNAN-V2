<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterBarang;
use Illuminate\Support\Str;

class MasterBarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MasterBarang::create([
            //'kode_id',
            'nama' => 'barang baru',
            'slug' => Str::slug('barang baru'),
            'keterangan' => 'keterangan belum ada',
            'kategori_id' => '1',
        ]);
    }
}
