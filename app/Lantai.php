<?php

namespace App;
use App\Guest;
use Illuminate\Database\Eloquent\Model;

class lantai extends Model
{
    protected $table = 'lantais';
    protected $fillable = [
        'name_lantai', 'lokasis'
    ];

    public function guest(){
        // return $this->hasMany('App\Guest');
        return $this->hasMany('App\Guest');
    }
}
