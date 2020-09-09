<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TOA extends Model
{

    protected $table = 'Access.TOA' ;

    protected $primaryKey   = 'ID';

    public $timestamps      = false;

    protected $guarded = [];

    public function provider()
    {
        return $this->belongsTo('App\TrainingProvider', 'Training Orginisation', 'ID');
    }

    public function course()
    {
        return $this->belongsTo('App\TOTCourse', 'Course Trained', 'ID');
    }

    public function name()
    {
        return $this->belongsTo('App\TPPTrainer', 'Full Name1', 'ID');
    }

    public function deliveryChannel()
    {
        return $this->belongsTo('App\TOTDC', 'NewCODE', 'Delivery Channel');
    }

    public function attendees()
    {
        return $this->hasMany('App\TOATraining', 'TOA_ID', 'ID');
    }


    public static $ownerOrTrainers = [
        'Owner'                 => 'Owner',
        'Assessor'              => 'Assessor',
        'Trainer & Assessor'    => 'Trainer & Assessor',
        'Enterprise Assessor'   => 'Enterprise Assessor'
    ];

    public static $competents = [
        'Competent'             => 'Competent',
        'Not Competent'         => 'Not Competent',
        'Not applicable'        => 'Not applicable',
    ];
}
