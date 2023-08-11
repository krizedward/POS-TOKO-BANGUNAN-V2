<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
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
    protected $table = 'master_barang';
    protected $dates = ['deleted_at'];
      
    protected $fillable = [
        'nama',
        'slug',
        'keterangan',
        'kategori_id',
        'satuan_id',
    ];
 
    public function satuan()
    {
        return $this->belongsTo('App\Models\MasterSatuanBarang', 'satuan_id');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\MasterKategoriBarang', 'kategori_id');
    }
}
