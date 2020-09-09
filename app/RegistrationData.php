<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationData extends Model
{
    protected $table        = 'Access.Registration data';

    protected $primaryKey   = 'ID';

    public $timestamps      = false;

    protected $guarded      = ['ID'];
}
