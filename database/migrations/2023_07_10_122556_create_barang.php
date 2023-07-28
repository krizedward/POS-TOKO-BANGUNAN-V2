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
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable();
            $table->string('slug')->nullable();
            $table->text('keterangan')->nullable(); // untuk nama url
            //custom
            $table->unsignedBigInteger('master_id')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->unsignedBigInteger('satuan_id')->nullable();
            $table->timestamps();

            // relasi
            $table->foreign('kategori_id')
            ->references('id')->on('kategori_barang')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('satuan_id')
            ->references('id')->on('barang_satuan')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('master_id')
            ->references('id')->on('barang_master')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
