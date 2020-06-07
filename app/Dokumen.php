<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    //
    protected $table='dokumen';
    protected $primaryKey='id_dokumen';
    protected $fillable=['id_pelanggan','nama_dokumen', 'jenis_dokumen','status_dokumen', 'tgl_kirim_dokumen', 'tgl_ambil_dokumen', 'harga'];
}
