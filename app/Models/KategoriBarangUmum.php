<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarangUmum extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder KategoriBarangUmumTableSeeder
     * php artisan db:seed --class=KategoriBarangUmumTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'kategori_barang_umum';
 
    protected $fillable = [
        'nama',
        'slug',
    ];
}
