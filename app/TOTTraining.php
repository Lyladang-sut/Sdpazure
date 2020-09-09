<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TOTTraining extends Model
{

    protected $table = 'Access.TOT Training';

    protected $primaryKey   = 'ID';

    public $timestamps      = false;

    protected $guarded = ['ID', 'unique'];

    
    
}
