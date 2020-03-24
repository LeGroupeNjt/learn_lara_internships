<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $guarded=[];
    protected $fillable=[
        'rendezvous_desc',
        'start_date',
        'end_date'
    ];
}
