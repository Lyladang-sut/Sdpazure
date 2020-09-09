<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseHold extends Model
{
    protected $table        = 'Access.Household';

    protected $primaryKey   = 'ID';

    public $timestamps      = false;

    protected $guarded  = ['Q2 Answer', 'Q5 Answer', 'Q8 Answer', 'Q10 Answer', 'Q11 Answer'];

    public function trainee()
    {
        return $this->belongsTo('App\Trainee', 'ID', 'Personal ID');
    }

    public function provider()
    {
        return $this->belongsTo('App\TrainingProvider','Institution', 'ID');
    }

}
