<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBarangKeluar extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder LogBarangKeluarTableSeeder
     * php artisan db:seed --class=LogBarangKeluarTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'log_barang_keluar';
    
    protected $fillable = [
      'barang_id',
      'banyak',
      'waktu',
    ];

    public function barang()
    {
      return $this->belongsTo('App\Models\Barang', 'barang_id');
    }
}
