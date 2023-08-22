<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaBarangEcer extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Next Step.
     * php artisan make:seeder HargaBarangLusinTableSeeder
     * php artisan db:seed --class=HargaBarangLusinTableSeeder
     * Happy Coding :)
     */
    
    protected $primaryKey = 'id';
    protected $table = 'harga_barang_ecer';
    protected $dates = ['deleted_at'];
 
    protected $fillable = [
        'barang_id', // barang stok
        'jumlah',
        'harga',
        'tanggal_harga',
        // 'satuan_id',
    ];

    public function barangStok()
    {
        return $this->belongsTo(BarangStok::class, 'barang_id');
    }
 
    public function masterSatuan()
    {
        return $this->belongsTo(MasterSatuanBarang::class, 'satuan_id');
    }
}
