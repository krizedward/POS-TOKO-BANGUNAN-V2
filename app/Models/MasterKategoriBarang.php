<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKategoriBarang extends Model
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
    protected $table = 'master_kategori_barang';
    protected $dates = ['deleted_at'];
     
    protected $fillable = [
        'kategori_umum_id',
        'nama',
        'slug',
    ];

    public function umum()
    {
        return $this->belongsTo('App\Models\KategoriBarangUmum', 'kategori_umum_id');
    }
}
