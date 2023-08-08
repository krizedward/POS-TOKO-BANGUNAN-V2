<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori_barang_umum', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable(); // untuk nama kategori
            $table->string('slug')->nullable(); // untuk nama url 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_barang_umum');
    }
};
