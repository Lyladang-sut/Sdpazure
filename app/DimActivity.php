<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DimActivity extends Model
{
    protected $table = 'Access.DimActivity';

    public function Enterprises()
    {
        return $this->hasMany('App\Enterprise', 'ID', 'Activity');
    }
}
