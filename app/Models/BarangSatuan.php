<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangSatuan extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Next Step.
     * php artisan make:seeder BarangSatuanTableSeeder
     * php artisan db:seed --class=BarangSatuanTableSeeder
     * Happy Coding :)
     */
    
    protected $primaryKey = 'id';
    protected $table = 'barang_satuan';
    protected $dates = ['deleted_at'];
     
    protected $fillable = [
        'nama',
        'slug',
        'keterangan',
    ];
}
