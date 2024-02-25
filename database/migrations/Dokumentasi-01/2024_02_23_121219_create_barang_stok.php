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
        Schema::create('barang_stok', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->unsignedBigInteger('satuan_id')->nullable();
            $table->integer('stok_total')->nullable();
            $table->integer('stok_masuk')->nullable();
            $table->integer('stok_keluar')->nullable();
            $table->string('status_stok')->nullable(); // aman, lebih, kurang
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('barang_id')
            ->references('id')->on('barang')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('satuan_id')
            ->references('id')->on('barang_satuan')
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
        Schema::dropIfExists('barang_stok');
    }
};
