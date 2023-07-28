<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUmumProduk extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder KategoriProdukTableSeeder
     * php artisan db:seed --class=KategoriProdukTableSeeder
     * Happy Coding :)
     */

     protected $primaryKey = 'id';
     protected $table = 'kategori_umum_produk';
 
     protected $fillable = [
         'kategori_umum_id',
         'nama',
         'slug',
     ];
 
    //  public function detail()
    //  {
    //      return $this->hasMany('App\Models\KategoriProdukDetail', 'kategori_id');
    //  }
 
     // public function products()
     // {
     //     return $this->hasMany(Product::class);
     // }
}
