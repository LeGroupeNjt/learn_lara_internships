<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table='patients';
    public $timestamps=false;
    protected $fillable = ['nom', 'prenom', 'sexe','age','numtele','cin'];

    public function rendezvous()
    {
        return $this->belongsToMany('App\Rendezvous');
    }
}
