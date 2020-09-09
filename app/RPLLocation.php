<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RPLLocation extends Model
{
    protected $table = 'Access.ProvinceTA' ;

    public function rplLocation()
    {
        return $this->belongsTo('App\RPL','Province', 'location');
    }


}
