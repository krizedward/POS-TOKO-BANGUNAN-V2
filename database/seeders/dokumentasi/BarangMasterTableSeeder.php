<?php

namespace Database\Seeders;

// add model
use App\Models\BarangMaster;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = array(
            array('nama' => 'Tiga Roda'),
            array('nama' => 'Asbes Gelombang AD')
        );

        foreach ($datas as $data) {
            BarangMaster::firstOrCreate(
                ['nama' => $data['nama']],
            );
        }
    }
}
