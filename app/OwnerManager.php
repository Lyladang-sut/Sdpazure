<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerManager extends Model
{
    protected $table = 'Access.OwnerManager';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $guarded = [];

    public function industry()
    {
        return $this->belongsTo('App\Industry', 'ID', 'OM ID');
    }

    public function OMTrainerExp()
    {
        return $this->hasMany('App\OMTrainerExperience', 'OWMA id', 'ID' );
    }

    public function intervent()
    {
        return $this->hasOne('App\Intervention', 'ID', 'IADC Training');
    }

    public function omemptrains()
    {
        return  $this->hasMany('App\OMempTrain', 'OWMA ID', 'ID');
    }

    public function trainers(){
        return $this->hasMany('App\OMTrainerExperience', 'OWMA id', 'ID');
    }

    public function experts(){
        return $this->hasMany('App\OMempTrain', 'OWMA ID', 'ID');
    }
    
}
