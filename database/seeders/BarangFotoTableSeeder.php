<?php

namespace Database\Seeders;

// add model
use App\Models\BarangFoto;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangFotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BarangFoto::create([
            'barang_id' => '1',
            'nama' => 'foto.jpg',
            'path' => 'foto.jpg',
        ]);
    }
}
