<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukHargaEcer extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $table = 'produk_harga_ecer';
    
    protected $fillable = [
      'produk_id',
      'jumlah',
      'harga',
      'tanggal_harga',
    ];

    public function produk()
    {
        return $this->hasOne('App\Models\Produk', 'id');
    }
}
