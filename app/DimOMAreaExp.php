<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DimOMAreaExp extends Model
{
    protected $table = 'Access.DimOMAreaExp';

    public function omemptrain()
    {
        return $this->hasMany('App\OMempTrain', 'Area expertise om', 'ID' );
    }
}
