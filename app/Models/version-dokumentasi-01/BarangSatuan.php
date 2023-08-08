<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangSatuan extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder BarangSatuanTableSeeder
     * php artisan db:seed --class=BarangSatuanTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'barang_satuan';
    
    protected $fillable = [
      'nama',
      'keterangan',
      'slug',
    ];
}
