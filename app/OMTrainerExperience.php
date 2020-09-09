<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OMTrainerExperience extends Model
{
    protected $table = 'Access.OMTrainerExperience';

    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $guarded = ['ID'];

    public function OwnerManager()
    {
        return $this->belongsTo('App\OwnerManager','ID', 'OWMA id');
    }
}


