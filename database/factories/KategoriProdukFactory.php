<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\KategoriProduk;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KategoriProduk>
 */
class KategoriProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    protected $model = KategoriProduk::class;

    public function definition(): array
    {
        $kodeId = "KP";
        $kodeNomor = Str::padLeft(mt_rand(1, 99999), 5, '0');
        $nama1 = $this->faker->word();
        $nama2 = $nama1.' '.$nama1; 
        $slug1 = Str::slug($nama2);
        $desc1 = $this->faker->sentence();
        $desc2 = $this->faker->paragraph(3);

        return [
            //
            'kode_id' => $kodeId,
            // 'kode_nomor' => $kodeNomor,
            'nama' => $nama2,
            'slug' => $slug1,
            // 'deskripsi' => $desc1,
        ];
    }
}
