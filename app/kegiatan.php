<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
  protected function donatur(){
    return $this->hasMany('App\Vote','id_donatur','id_donatur');
}
}
