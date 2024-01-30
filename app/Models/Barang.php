<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Next Step.
     * php artisan make:seeder BarangTableSeeder
     * php artisan db:seed --class=BarangTableSeeder
     * Happy Coding :)
     */

    protected $primaryKey = 'id';
    protected $table = 'barang';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nama',
        'slug',
    ];

    public function barangGambars()
    {
        return $this->hasMany(BarangGambar::class, 'barang_id');
    }
}
