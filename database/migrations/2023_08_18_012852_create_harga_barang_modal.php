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
        Schema::create('harga_barang_modal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('master_barang_id')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('harga')->nullable();
            $table->date('tanggal_harga')->nullable();
            $table->timestamps();
            
           // relasi
           $table->foreign('master_barang_id')
           ->references('id')->on('barang_stok')
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
        Schema::dropIfExists('harga_barang_modal');
    }
};
