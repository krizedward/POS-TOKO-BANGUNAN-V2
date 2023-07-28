<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;
    
    /**
     * Next Step.
     * php artisan make:seeder KategoriBarangTableSeeder
     * php artisan db:seed --class=KategoriBarangTableSeeder
     * Happy Coding :)
     */
    
    protected $primaryKey = 'id';
    protected $table = 'kategori_barang';

    protected $fillable = [
        'kategori_umum_id',
	    'nama',
		'slug',
    ];

    public function umum()
    {
      return $this->belongsTo('App\Models\KategoriUmumProduk', 'kategori_umum_id');
    }
}
