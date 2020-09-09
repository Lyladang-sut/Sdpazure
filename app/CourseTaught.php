<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTaught extends Model
{
    
    protected $table = 'Access.Course Taught';

    // Delare to make change 
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $guarded      = ['ID']; // Need to guard ID

}
