<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // KategoriUmumProdukTableSeeder::class,
            // KategoriProdukTableSeeder::class,
            
            KategoriBarangUmumTableSeeder::class,
            KategoriBarangTableSeeder::class,
            BarangSatuanTableSeeder::class,
            BarangTableSeeder::class,
            OrderBarangTableSeeder::class,
            TemporderBarangTableSeeder::class,
            
            // BarangUkuranTableSeeder::class,
            // BarangMasterTableSeeder::class,
            // BarangStokTableSeeder::class,
            // LogBarangMasukTableSeeder::class,
            // LogBarangKeluarTableSeeder::class,
            // BarangFotoTableSeeder::class,

            // CategoryProductTableSeeder::class,
            // KategoriProdukTableSeeder::class,
            // KategoriProdukDetailTableSeeder::class,
            // KategoriSuplierTableSeeder::class,
            // ProdukSatuanTableSeeder::class,
            // ProdukTableSeeder::class,

            // ProdukStokTableSeeder::class,
            // ProdukHargaEcerTableSeeder::class,
            // ProdukHargaModalTableSeeder::class,
            // ProdukHargaLusinTableSeeder::class,
            // ProdukHargaTokoTableSeeder::class,
            // tambahkan seeder lainnya di sini jika ada
        ]);
    }
}
