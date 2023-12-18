<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaBarangModal extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Next Step.
     * php artisan make:seeder KategoriBarangTableSeeder
     * php artisan db:seed --class=KategoriBarangTableSeeder
     * Happy Coding :)
     */
    
    protected $primaryKey = 'id';
    protected $table = 'harga_barang_modal';
    protected $dates = ['deleted_at'];
        
    protected $fillable = [
        'barang_id', // barang stok
        'jumlah',
        'harga',
        'tanggal_harga',
        // 'satuan_id',
    ];
 
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
 
    public function masterSatuan()
    {
        return $this->belongsTo(MasterSatuanBarang::class, 'satuan_id');
    }
}
