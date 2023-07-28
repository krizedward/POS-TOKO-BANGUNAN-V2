<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSuplier extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder KategoriSuplierTableSeeder
     * php artisan db:seed --class=KategoriSuplierTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'kategori_suplier';

    protected $fillable = [
        'kode_id',
		'kode_nomor',
		'nama',
		'slug',
		'deskripsi',
    ];
}
