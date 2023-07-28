<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukHargaUmum extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'produk_harga_umum';
    
    protected $fillable = [
      'produk_id',
      'stok_id',
      'harga_modal',
      'harga_jual',
    ];

    public function stok()
    {
        // return $this->hasOne('App\Models\Talent','user_id');
        // return $this->hasOne('App\Models\KategoriProduk', 'kategori_id');
        return $this->hasOne('App\Models\ProdukStok', 'id');
    }
}
