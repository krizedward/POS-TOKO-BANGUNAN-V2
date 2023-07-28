<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukGambar extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'produk_gambar';
    
    protected $fillable = [
      'produk_id',
      'nama',
      'path',
    ];

    public function produk()
    {
        // return $this->hasOne('App\Models\Talent','user_id');
        // return $this->hasOne('App\Models\KategoriProduk', 'kategori_id');
        return $this->belongsTo('App\Models\Produk', 'id');
    }
}
