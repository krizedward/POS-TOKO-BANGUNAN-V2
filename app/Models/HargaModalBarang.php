<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaModalBarang extends Model
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
    protected $table = 'harga_modal_barang';
    protected $dates = ['deleted_at'];
          
    protected $fillable = [
        'barang_id', // barang stok
        'satuan_id', // barang stok
        'jumlah',
        'harga',
        'tanggal_harga',
        // 'satuan_id',
    ];
   
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
  
    public function satuan()
    {
        return $this->belongsTo(BarangSatuan::class, 'satuan_id');
    }
   
    public function masterSatuan()
    {
        return $this->belongsTo(MasterSatuanBarang::class, 'satuan_id');
    }
}