<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $table='rendezvous';
    protected $fillable=['description','id_patient','id_consultation','daterendezvous'];
    public $timestamps=false;

    public function patients()
    {
        return $this->belongsTo('App\Patient','id_patient');
    }

    public function consultation()
    {
       return $this->belongsTo('App\Consultation','id_consultation');
    }
}
