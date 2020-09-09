<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $table = 'Access.Intervention';

    public function onwermanager()
    {
        return $this->belongsTo('App\OwnerManager', 'IADC Training', 'ID' );
    }
}
