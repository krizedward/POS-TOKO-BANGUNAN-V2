<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeterangan extends Model
{
    use HasFactory;
    // use SoftDeletes;

    /**
     * Next Step.
     * php artisan make:seeder BarangGambarTableSeeder
     * php artisan db:seed --class=BarangGambarTableSeeder
     * Happy Coding :)
     */

    protected $table = 'barang_keterangan';

    protected $fillable = [
        'barang_id',
        'keterangan',
    ];
}
