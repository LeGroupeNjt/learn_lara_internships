<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $table='consultations';
    public $timestamps=false;
    protected $fillable = ['type', 'prix'];

    public function rendezvous(){
        return $this->belongsToMany('App\Rendezvous');
    }
}
