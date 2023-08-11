<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_barang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable();
            $table->string('slug')->nullable();
            $table->text('keterangan')->nullable(); // untuk nama url
            //custom
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->unsignedBigInteger('satuan_id')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            // relasi
            $table->foreign('kategori_id')
            ->references('id')->on('master_kategori_barang')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('satuan_id')
            ->references('id')->on('master_satuan_barang')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_barang');
    }
};
