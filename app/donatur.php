<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donatur extends Model
{
   
    protected function jenis_donatur(){
        return $this->hasMany('App\Jenis_donatur','id_jenis_donatur','id_jenis_donatur');
    }
  //  protected $table='donasis';
}
