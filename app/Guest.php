<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
use App\Lokasi;
use App\Ruang;
use App\Lantai;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    use SoftDeletes;
    protected $table = 'guests';
    protected $dates = ['deleted_at'];
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'datein', 'dateout', 'guestid', 'name', 'telephone','company', 'email', 
        'activity', 'noRack', 'noLoker', 'lokasi_id', 'lantai_id', 'ruangan_id', 'remarks', 
        'durasi', 'foto', 'service_quality', 'infrastructure_quality','clean_quality','id_status'
    ];
    public function lokasi(){
        return $this->belongsTo('App\Lokasi');
    }

}
