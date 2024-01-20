<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriBarangUmum;
use Illuminate\Support\Str;


class KategoriBarangUmumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = array(
            array('name' => 'Alat Angkut Barang'),
            array('name' => 'Alat Keselamatan'),
            array('name' => 'Alat Perkebunan'),
            array('name' => 'Alat Ukur Industri'),
            array('name' => 'Baut & Mur Pengencang'),
            array('name' => 'Cat & Perlengkapan'),
            array('name' => 'Generator & Genset'),
            array('name' => 'Gerobak'),
            array('name' => 'HandsTools'),
            array('name' => 'Ledeng'),
            array('name' => 'Machinery'),
            array('name' => 'Material Bangunan'),
            array('name' => 'Mesin Produksi'),
            array('name' => 'Motor & Power Transmission'),
            array('name' => 'Otomasi Industrial'),
            array('name' => 'Perlengkapan Las'),
            array('name' => 'Perlengkapan Listrik'),
            array('name' => 'Pneumatic'),
            array('name' => 'Power Tools'),
            array('name' => 'Tape & Sealant Perekat'),
            array('name' => 'Tenaga Surya'),
        );

        foreach ($datas as $data) {
            KategoriBarangUmum::create([
            //  'id' => $data['id'],
             'nama' => $data['name'],
             'slug' => Str::slug($data['name']),
           ]);
        }
    }
}
