<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->bigIncrements('id_dokumen');
            $table->unsignedBigInteger('id_pelanggan');
            $table->string('nama_dokumen')->nullable();
            $table->string('jenis_dokumen')->nullable();
            $table->enum('status_dokumen', ['Selesai', 'Belum', 'Pending'])->nullable();
            $table->dateTime('tgl_kirim_dokumen')->nullable();
            $table->dateTime('tgl_ambil_dokumen')->nullable();
            $table->string('harga')->nullable();
            $table->timestamps();
            $table->foreign('id_pelanggan')
            ->references('id_pelanggan')->on('pelanggan')
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
        Schema::dropIfExists('dokumen');
    }
}
