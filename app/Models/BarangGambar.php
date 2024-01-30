<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangGambar extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Next Step.
     * php artisan make:seeder BarangGambarTableSeeder
     * php artisan db:seed --class=BarangGambarTableSeeder
     * Happy Coding :)
     */

    protected $table = 'barang_gambar';

    protected $fillable = [
        'barang_id',
        'filename',
        'path',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
