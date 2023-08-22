<?php

namespace Database\Seeders;

// add model
use App\Models\BarangUkuran;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangUkuranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = array(
            array('barang_id' => '1' , 'angka' => '40'),
            array('barang_id' => '2' , 'angka' => '110 x 110'),
        );

        foreach ($datas as $data) {
            BarangUkuran::create([
                'barang_id' => $data['barang_id'],
                'angka' => $data['angka'],
            ]);
        }
    }
}
