<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PembayaranOnline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_online', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->unsignedBigInteger('id_dokumen');
            $table->unsignedBigInteger('id_petugas');
            $table->enum('status_pembayaran', ['Sudah Bayar', 'Belum Bayar'])->nullable();
            $table->enum('jenis_pembayaran', ['Cash', 'Transfer'])->nullable();
            $table->timestamps();
            $table->foreign('id_dokumen')
            ->references('id_dokumen')->on('dokumen')
            ->onDelete('no action');
            $table->foreign('id_petugas')
            ->references('id_petugas')->on('petugas')
            ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_online');
    }
}
