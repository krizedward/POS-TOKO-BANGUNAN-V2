<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMaster extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder BarangMasterTableSeeder
     * php artisan db:seed --class=BarangMasterTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'barang_master';
    
    protected $fillable = [
      'nama',
      'merk',
    ];
}
