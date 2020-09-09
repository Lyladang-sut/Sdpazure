<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OmAtInTake extends Model
{
    protected $table = 'Access.OM at Intake' ; 

    public function name()
    {
        return $this->belongsTo('App\RPLTest', 'ID', 'Participant Name');
    } 
}


