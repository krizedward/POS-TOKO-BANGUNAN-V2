<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangUkuran extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder BarangUkuranTableSeeder
     * php artisan db:seed --class=BarangUkuranTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'barang_ukuran';
    
    protected $fillable = [
      'barang_id',
      'angka',
    ];
}
