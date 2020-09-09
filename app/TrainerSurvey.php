<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerSurvey extends Model
{
    protected $table = 'Access.Trainer feedback questionnaire';

    protected $primaryKey = 'ID';

    public $timestamps      = false;

    protected $guarded = [];

    public function batch()
    {
        return $this->belongsTo('App\BatchCourseCode', 'Course Batch ID', 'ID');
    }

    public function provider()
    {
        return $this->belongsTo('App\TrainingProvider', 'Training Provider', 'ID');
    }

    public function trainer()
    {
        return $this->belongsTo('App\TPPTrainer', 'Name Of Trainer', 'ID');
    }

    public function submitter()
    {
        return $this->belongsTo('App\Submitter', 'Submitter', 'ID');
    }

    public static $select_anwser = [
        ''                  => '',
        'Strongly Agree'    => 'Strongly Agree',
        'Agree'             => 'Agree',
        'Disagree'          => 'Disagree',
        'Strongly Disagree' => 'Strongly Disagree',
        'NA'                => 'NA'
    ];

    public static $subject_trainer = [
        '' => '',
        'Beauty Salon' => 'Beauty Salon',
        'English' => 'English',
        'Food & Beverage Server' => 'Food & Beverage Server',
        'House wiring' => 'House wiring',
        'Motorcycle repair' => 'Motorcycle repair',
        'Receptionist' => 'Receptionist',
        'Room Attendant' => 'Room Attendant',
        'Room Attendant - Food & Beverage Server' => 'Room Attendant - Food & Beverage Server',
        'Sewing' => 'Sewing',
        'Small Engine' => 'Small Engine'
        
    ];

    public static $score = [
        '' => '',
        'Excellent' => 'Excellent',
        'Good' => 'Good',
        'Average' => 'Average',
        'Poor' => 'Poor',
        'NA' => 'NA',
    ];
}
