<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DimTargetJob extends Model
{
    
    protected $table = 'Access.DimTarget Job';

    public function empRegistration()
    {
        return $this->hasMany('App\EmpRegistration', 'ID', 'Target Job');
    }

}
