<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangFoto extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder BarangFotoTableSeeder
     * php artisan db:seed --class=BarangFotoTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'barang_foto';
    
    protected $fillable = [
      'barang_id',
      'nama',
      'path',
    ];
}
