<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $table='pelanggan';
    protected $primaryKey='id_pelanggan';
    protected $fillable=['id_user','jenis_pelanggan'];
}
