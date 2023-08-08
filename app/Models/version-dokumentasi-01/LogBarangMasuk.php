<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBarangMasuk extends Model
{
    use HasFactory;

    /**
     * Next Step.
     * php artisan make:seeder LogBarangMasukTableSeeder
     * php artisan db:seed --class=LogBarangMasukTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'log_barang_masuk';
    
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
