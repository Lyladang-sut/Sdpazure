<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingAccessed extends Model
{

    protected $table = 'Access.TrainingAccessed';

    protected $primaryKey   = 'ID';
    public $timestamps      = false;

    protected $guarded      = ['ID', 'Validation', 'index', 'Date Timestamp'];

    public function trainee()
    {
        return $this->belongsTo('App\Trainee', 'ID', 'Personal ID');
    }

    public function courses()
    {
        return $this->belongsTo('App\CourseTopic', 'Course Topic', 'Course code');
    }

    public function coursescode()
    {
        return $this->belongsTo('App\CourseCode', 'Course id (IADC)', 'ID');
    }

    public function batchnumber()
    {
        return $this->belongsTo('App\BatchId', 'Batch Number', 'ID');
    }

    public function institutionproviding()
    {
        return $this->belongsTo('App\TrainingProvider', 'Training Provider', 'ID');
    }

    public function certificateReceived()
    {
        return $this->belongsTo('App\DimCertificateReceived', 'Certificate Received', 'ID');
    }

    public function omatintake()
    {
        return $this->belongsTo('App\OmAtInTake', 'Enterprise Supervisor', 'ID');
    }

    public function enterprise()
    {
        return $this->belongsTo('App\Enterprise', 'Enterprise', 'ID');
    }

}
