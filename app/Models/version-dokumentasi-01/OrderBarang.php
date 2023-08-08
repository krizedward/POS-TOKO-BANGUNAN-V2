<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBarang extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder OrderBarangTableSeeder
     * php artisan db:seed --class=OrderBarangTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'order_barang';

    protected $fillable = [
        'barang_id',
        'banyak',
        'harga',
        'jumlah',
    ];
}
