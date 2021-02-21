<?php

namespace App;
use App\Guest;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'ruangs';

    public function guest(){
        // return $this->hasMany('App\Guest');
        return $this->hasMany('App\Guest');
    }
}
