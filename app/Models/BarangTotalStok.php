<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangTotalStok extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder BarangStokTableSeeder
     * php artisan db:seed --class=BarangStokTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'barang_total_stok';
    
    protected $fillable = [
      'barang_id',
      'total_banyak',
      'bulan_stok',
      'tahun_stok',
    ];

    public function barang()
    {
      return $this->belongsTo('App\Models\Barang', 'barang_id');
    }
}
