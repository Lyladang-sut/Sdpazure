<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSurvey extends Model
{
    protected $table        = 'Access.Questionnaire post training';

    protected $primaryKey   = 'ID';

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

    public function submitter()
    {
        return $this->belongsTo('App\Submitter', 'Submitter', 'ID');
    }

    public static $sexes = [
        ''          => '',
        'Male'      => 'Male',
        'Female'    => 'Female',
        'Other'     => 'Other'
    ];
    
    public static $chooseAnswers = [
        
        '' => '' ,
        'Strongly Agree' => 'Strongly Agree' ,
        'Agree' => 'Agree' ,
        'Disagree' => 'Disagree' ,
        'Strongly Disagree' =>  'Strongly Disagree',
        'NA'=>'NA',
    ];

    public static $selects = [
        
        '' => '' ,
        'Sufficient' => 'Sufficient' ,
        'Too Long' => 'Too Long' ,
        'Too short' => 'Too short' ,
        'NA'=>'NA',
    ];

    public static $chooses = [
        
        '' => '' ,
        'Excellent' => 'Excellent' ,
        'Good' => 'Good' ,
        'Average' => 'Average' ,
        'Poor' =>  'Poor',
        'NA'=>'NA',
    ];

    public static $satisfylevel = [
        
        '' => '' ,
        'Highly Satisfied' => 'Highly Satisfied' ,
        'Satisfied' => 'Satisfied' ,
        'Partially Satisfied' => 'Partially Satisfied' ,
        'Not Satisfied' =>  'Not Satisfied',
        'NA'=>'NA',
    ];
}
