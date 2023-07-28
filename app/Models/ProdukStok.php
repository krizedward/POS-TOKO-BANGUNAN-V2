<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukStok extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'produk_stok';
    
    protected $fillable = [
      'produk_id',
      'jumlah',
      'jenis',
    ];

    public function satuan()
    {
        // return $this->hasOne('App\Models\Talent','user_id');
        // return $this->hasOne('App\Models\KategoriProduk', 'kategori_id');
        return $this->belongsTo('App\Models\ProdukSatuan', 'id');
    }
}
