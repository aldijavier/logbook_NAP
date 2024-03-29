<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;
    protected $table = 'statuses';
    protected $primaryKey = 'id';
    protected $fillable = ['id','status'];
}
