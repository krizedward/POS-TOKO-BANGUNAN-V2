<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporderBarang extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder TemporderBarangTableSeeder
     * php artisan db:seed --class=TemporderBarangTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'temporder_barang';

    protected $fillable = [
        'barang_id',
        'banyak',
        'harga',
        'jumlah',
    ];
}
