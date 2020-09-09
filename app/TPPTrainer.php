<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TPPTrainer extends Model
{
    protected $table = 'Access.TPP Trainers';

    // Delare to make change 
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $guarded      = ['ID']; // Need to guard ID

    public function experts()
    {
        return $this->hasMany('App\AreaOfExpertise', 'TPPTrainerID', 'ID');
    }

    public function courses()
    {
        return $this->hasMany('App\CourseTaught', 'TPPTrainerID', 'ID');
    }

}
