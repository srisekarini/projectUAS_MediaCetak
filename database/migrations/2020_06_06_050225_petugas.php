<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Petugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_petugas');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
            ->references('id_user')->on('users')
            ->onDelete('no action');
            $table->dateTime('tgl_tugas')->nullable();
            $table->enum('shift', ['Pagi', 'Malam'])->nullable();
            $table->string('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}
