<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarangGudang extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Next Step.
     * php artisan make:seeder HargaJualBarangTableSeeder
     * php artisan db:seed --class=HargaJualBarangTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'stok_barang_gudang';
    protected $dates = ['deleted_at'];
          
    protected $fillable = [
        'barang_id',
        'ukuran_barang',
        'satuan_id',
        'stok_masuk',
        'stok_keluar',
        'status_stok',
    ];
}
