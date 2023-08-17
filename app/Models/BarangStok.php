<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangStok extends Model
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
    protected $table = 'barang_stok';
    protected $dates = ['deleted_at'];
       
    protected $fillable = [
        'master_barang_id',
        'ukuran_barang',
        'satuan_id',
        'stok_masuk',
        'stok_keluar',
        'status_stok',
        // 'satuan_id',
    ];

    public function masterBarang()
    {
        return $this->belongsTo(MasterBarang::class, 'master_barang_id');
    }

    public function masterSatuan()
    {
        return $this->belongsTo(MasterSatuanBarang::class, 'satuan_id');
    }

}
