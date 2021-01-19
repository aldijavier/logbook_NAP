<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
use App\Lokasi;

class Guest extends Model
{
    protected $table = 'guests';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'datein', 'dateout', 'guestid', 'name', 'telephone','company', 'email', 
        'activity', 'noRack', 'noLoker', 'lokasi_id', 'remarks', 
        'durasi', 'foto', 'id_status'
    ];
    public function lokasi(){
        return $this->belongsTo('App\Lokasi');
    }

}
