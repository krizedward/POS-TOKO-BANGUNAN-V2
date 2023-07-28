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
        Schema::create('barang_total_stok', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->integer('total_banyak')->nullable(); // total = masuk - keluar
            $table->string('bulan_stok')->nullable();
            $table->string('tahun_stok')->nullable();
            $table->string('ket_stok')->nullable();
            // gudang, toko
            $table->timestamps();

            // relasi
            $table->foreign('barang_id')
            ->references('id')->on('barang')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_total_stok');
    }
};
