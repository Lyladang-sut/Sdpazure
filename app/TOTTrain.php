<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TOTTrain extends Model
{
    protected $table = 'Access.TOTTrain';

    public function tots()
    {
        return $this->hasMany('App\TOT', 'ID', 'Organisation');
    }
}
