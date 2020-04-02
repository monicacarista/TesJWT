<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donasi extends Model
{
    protected function donatur(){
        return $this->hasMany('App\Vote','id_donatur','id_donatur');
    }
    protected function jenis_donasi(){
        return $this->hasMany('App\Vote','id_jenis_donasi','id_jenis_donasi');
    }
    protected function kegiatan(){
        return $this->hasMany('App\Vote','id_kegiatan','id_kegiatan');
    }
}

