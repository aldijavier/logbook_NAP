<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guest;
class Lokasi extends Model
{
    public $timestamps = false;
    protected $table = 'lokasis';
    protected $primaryKey = 'id';
    protected $fillable = ['id','lokasi'];

    public function guest(){
        // return $this->hasMany('App\Guest');
        return $this->hasMany('App\Guest');
    }
}
