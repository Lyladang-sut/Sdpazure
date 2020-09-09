<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TOT extends Model
{
    
    protected $table = 'Access.TOT';

    protected $primaryKey   = 'ID';

    public $timestamps      = false;

    protected $guarded = ['unique'];

    public function trainingProvider()
    {
        return $this->belongsTo('App\TrainingProvider', 'Training Orginisation', 'ID');
    }

    public function course()
    {
        return $this->belongsTo('App\TOTCourse', 'Course Trained', 'ID');
    }

    public function tottraining()
    {
        return $this->belongsTo('App\TOTTrain', 'Organisation', 'ID');
    }

    public function deliveryChannel()
    {
        return $this->belongsTo('App\TOTDC', 'Delivery Channel', 'NewCODE');
    }

    public function trainers()
    {
        return $this->belongsTo('App\TPPTrainer', 'Full Name', 'ID');
    }

    public function attendees()
    {
        return $this->hasMany('App\TOTTraining', 'TOT_ID', 'ID');
    }

    public static $result_tot = [
        'Competent'      => 'Competent',
        'Not Competent'  => 'Not Competent',
        'Not applicable' => 'Not applicable'
    ];

    public static $owner_trainer = [
        'Industry Expert' => 'Industry Expert',
        'Trainer' => 'Trainer',
    ];

    public static $intervention = [
        'IA1'   => 'IA1',
        'IA2'   => 'IA2'
    ];

   


}
