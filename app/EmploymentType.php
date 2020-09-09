<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentType extends Model
{
    protected $table = 'Access.Employment Type'; 

    public function trainee()
    {
        return $this->belongsTo('App\Trainee', 'Employment Type', 'Unemp ID');
    }
}
