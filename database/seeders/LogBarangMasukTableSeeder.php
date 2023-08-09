<?php

namespace Database\Seeders;

use App\Models\LogBarangMasuk;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogBarangMasukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = array(
            array('barang_id' => '1' , 'banyak' => '1'),
            array('barang_id' => '2' , 'banyak' => '2'),
        );

        foreach ($datas as $data) {
            LogBarangMasuk::create([
                'barang_id' => $data['barang_id'],
                'banyak' => $data['banyak'],
            ]);
        }
    }
}
