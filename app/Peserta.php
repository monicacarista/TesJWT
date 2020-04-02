<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    //
    protected $table='pesertas';
    protected $fillable=['nama_peserta'];

    public $timestaps=false;
}
