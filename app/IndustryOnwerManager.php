<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryOnwerManager extends Model
{
    protected $table = 'Access.OwnerManager';

    public function industry()
    {
        return $this->hasOne('App\Industry', 'ID', 'OM ID');
    }
}
