<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OMTrainingAccess extends Model
{
    
    protected $table = 'Access.OM Training Accessed';

    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $guarded      = ['ID'];

    public function trainingProviding()
    {
        return $this->belongsTo('App\TrainingProvider', 'Training Provider', 'ID');
    }

    public function course()
    {
        return $this->belongsTo('App\CourseCode', 'Course', 'ID');
    }

}
