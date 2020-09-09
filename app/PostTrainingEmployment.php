<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTrainingEmployment extends Model
{
    protected $table = 'Access.post training support Employment' ;

    protected $primaryKey   = 'ID';

    public $timestamps      = false;

    protected $guarded = ['ID', 'index', 'Salary Usd calc'];

    public function trainee()
    {
        return $this->belongsTo('App\Trainee', 'ID', 'personal ID');
    }

    public function employmentstatus()
    {
        return $this->belongsTo('App\EmploymentStatus','Employment status', 'ID');
    }

    public function enterprisename()
    {
        return $this->belongsTo('App\Enterprise','Enterprise Name', 'ID');
    }
}
