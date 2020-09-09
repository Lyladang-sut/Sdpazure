<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaOfExpertise extends Model
{
    
    protected $table = 'Access.Area of Exp';

    // Delare to make change 
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $guarded      = ['ID']; // Need to guard ID

}
