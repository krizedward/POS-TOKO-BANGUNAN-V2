<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder BarangTableSeeder
     * php artisan db:seed --class=BarangTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'barang';

    protected $fillable = [
        'nama',
        'harga',
        'kategori',
    ];
}
