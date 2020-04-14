<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donatur extends Model
{
   
    protected function jenis_donatur(){
        return $this->hasMany('App\Vote','id_jenis_donatur','id_jenis_donatur');
    }
   // protected $table='jenis_donaturs';
}
