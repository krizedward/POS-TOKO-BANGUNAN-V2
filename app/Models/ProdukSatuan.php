<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukSatuan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'produk_satuan';
    
    protected $fillable = [
      'nama',
      'slug',
    ];
}
