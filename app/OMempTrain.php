<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OMempTrain extends Model
{
    protected $table = 'Access.OM emp train';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $guarded = ['ID'];

    public function ownermanager()
    {
        return  $this->belongsTo('App\OwnerManager', 'ID', 'OWMA ID');
    }

    public function dimomareaexp()
    {
        return $this->belongsTo('App\DimOMAreaExp', 'Area expertise om','ID');
    }

}
