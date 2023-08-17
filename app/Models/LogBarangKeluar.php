<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBarangKeluar extends Model
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
    protected $table = 'log_barang_keluar';
    protected $dates = ['deleted_at'];
     
    protected $fillable = [
        'barang_id',
        'ukuran_barang',
        'satuan_id',
        'stok_masuk',
        'stok_keluar',
        'status_stok',
        // 'satuan_id',
    ];
 
    public function BarangStok()
    {
        return $this->belongsTo(BarangStok::class, 'barang_id');
    }
}
