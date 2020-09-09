<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessorImage extends Model
{
    protected $table = 'Access.Asseors?Images' ; 

    // Delare to make change 
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $guarded      = ['ID']; // Need to guard ID
}
