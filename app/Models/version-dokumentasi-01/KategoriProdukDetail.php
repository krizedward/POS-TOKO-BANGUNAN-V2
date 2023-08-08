<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProdukDetail extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder KategoriProdukTableSeeder
     * php artisan db:seed --class=KategoriProdukTableSeeder
     * Happy Coding :)
     */

     protected $primaryKey = 'id';
     protected $table = 'kategori_produk_detail';
 
     protected $fillable = [
         'kode_id',
         'kategori_id',
         'nama',
         'slug',
     ];
 
     public function kategori()
     {
         return $this->belongsTo('App\Models\KategoriProduk');
     }

     // public function products()
     // {
     //     return $this->hasMany(Product::class);
     // }
}
