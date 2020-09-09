<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProvider extends Model
{
    
    protected $table = 'Access.Training Providers Profile';

    // Delare to make change 
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $guarded      = [];

    public function tots(){
        return $this->hasMany('App\TOT', 'Training Orginisation', 'ID');
    }
    
    public function contacts()
    {
       return $this->hasMany('App\TppContact', 'Organisation', 'ID');
    }

    public function trainers()
    {
        return $this->hasMany('App\TPPTrainer', 'Organisation', 'ID');
    }
    
    public function assessors(){
        return $this->hasMany('App\Assessors', 'Organisation', 'ID');
    }

    public function trainingaccess(){
        return $this->hasMany('App\TrainingAccessed', 'Training Provider', 'ID');
    }

    public function toa(){
        return $this->hasMany('App\TOA', 'Training Orginisation', 'ID');
    }

    public function takings(){
        return $this->hasMany('App\OMTrainingAccess', 'Training Provider', 'ID');
    }

    public function submitters(){
        return $this->hasMany('App\User', 'Training Provider', 'ID');
    }

    public static $type = [
        'NGO' => 'NGO',
        'Public' => 'Public',
        'Private' => 'Private',
        'Foundation' => 'Foundation',
    ];

    public static $sector = [
        'Agriculture' => 'Agriculture',
        'Automotive' => 'Automotive',
        'Beauty' => 'Beauty',
        'Construction' => 'Construction',
        'Development' => 'Development',
        'Education' => 'Education',
        'Employment' => 'Employment',
        'Footwear' => 'Footwear',
        'Manufacture' => 'Manufacture',
        'Handicrafts' => 'Handicrafts',
        'Hospitality' => 'Hospitality',
        'IT & Communications' => 'IT & Communications',
        'Tourism' => 'Tourism',
        'Transport' => 'Transport',
        'Development' => 'Development',
    ];

    public static $learner_type = [
        '' => '',
        'Trainers/ Assessors' => 'Trainers/ Assessors',
        'Trainees' => 'Trainees'
    ];

    public static $sex = [
        '' => '',
        'Male' => 'Male',
        'Female' => 'Female',
        'Other' => 'Other'
    ];

    public static $last_grade = [
        '' => '',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        'Associate' => 'Associate',
        'Bachelor' => 'Bachelor',
        'Masters' => 'Masters'
    ];
}
