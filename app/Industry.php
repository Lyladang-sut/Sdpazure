<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{

    protected $table        = 'Access.OM at Intake';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $guarded      = ['ID'];

    public function submitter()
    {
        return $this->belongsTo('App\Submitter', 'Submitter', 'ID');
    }

    public function image()
    {
        return $this->hasOne('App\IndustryImage', 'ID', 'Photo');
    }

    public function enterprise()
    {
        return $this->belongsTo('App\Enterprise', 'Enterprise', 'ID');
    }

    public function ownermanager()
    {
        return $this->hasOne('App\OwnerManager', 'OM ID', 'ID');
    }

    public function trainings()
    {
        return $this->hasMany('App\OMTrainingAccess', 'OM ID', 'ID');
    }

    public function lastestTraining()
    {
        $result = $this->trainings()->orderBy('id', 'desc')->first();
        if ($result) {
            return $result;
        }
        return null;
    }

    public static $sexes = [
        'Male' => 'Male',
        'Female' => 'Female',
        'Other' => 'Other'
    ];

    public static $ethnic = [
        'ខ្មែរ/Khmer' => 'ខ្មែរ/Khmer',
        'ជនជាតិដើមភាគតិច/Ethnic Minority' => 'ជនជាតិដើមភាគតិច/Ethnic Minority',
        'ផ្សេងៗ/Non-Asian' => 'ផ្សេងៗ/Non-Asian'
    ];

    public static $status = [
        'គ្មានការងារធ្វើ/Unemployed' => 'គ្មានការងារធ្វើ/Unemployed',
        'មានការងារធ្វើ/Employed' => 'មានការងារធ្វើ/Employed'
    ];

    public static $yes_no = [
        'បាទ/Yes' => 'បាទ/Yes',
        'ទេ/No' => 'ទេ/No'
    ];

    public static $experiences = [
        'Yes' => 'Yes',
        'No'    => 'No'
    ];

    public static $grades = [
        'No Schooling' => 'No Schooling',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '12+' => '12+'
    ];
    
    public static $reasonDropOut = [
        '01' => 'មូលហេតុគ្រួសារ/ Family reasons',
        '02' => 'មូលហេតុសុខភាព/ Health reasons',
        '03' => 'មូលហេតុផ្ទាល់ខ្លួន/ Personal reasons',
        '04' => 'ឈប់ដោយសារមានការងារមិនពាក់ព័ន្ធវគ្គបណ្ដុះបណ្ដាល / Unrelated employment',
        '05' => 'ឈប់ដោយសារមានការងារពាក់ព័ន្ធវគ្គបណ្ដុះបណ្ដាល/ Related employment',
        '06' => 'ប្រព្រឹត្តខុសនឹងបទបញ្ជាផ្ទៃក្នុងរបស់មជ្ឈមណ្ឌល/ Violation of center rules/ regulations',
        '07' => 'មិនប្រាប់មូលហេតុ ឬមិនច្បាស់/ Reason NOT provided or Unclear',
        '08' => 'បញ្ហាទាក់ទង​នឹងយេនឌ័រ/Gender related issue',
        '09' => 'លក្ខខណ្ឌនិងបរិយាកាសនៅមជ្ឈមណ្ឌល/ Center environment/condition'
    ];
}
