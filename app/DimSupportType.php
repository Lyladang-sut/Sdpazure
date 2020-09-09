<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DimSupportType extends Model
{

    protected $table = 'Access.DimSuporttype';

    public function postTrainingSupports()
    {
        return $this->hasMany('App\PostTrainingSupport', 'Topic', 'ID');
    }

}
