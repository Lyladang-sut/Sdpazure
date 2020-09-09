<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{

    protected $table        = 'Access.Enterprise';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $guarded      = [];
    
    public function activity()
    {
        return $this->belongsTo('App\DimActivity', 'Activity', 'ID');
    }

    public function submitter()
    {
        return $this->belongsTo('App\Submitter', 'Submitter', 'ID');
    }

    public function industries()
    {
        return $this->hasMany('App\Industry', 'Enterprise', 'ID');
    }

    public function employments()
    {
        return $this->hasMany('App\EnterpriseEmployment', 'Enterprise ID', 'ID');
    }

    public function contacts()
    {
        return $this->hasMany('App\EnterpriseContact', 'Enterprise ID', 'ID');
    }

    public function recruitments()
    {
        return $this->hasMany('App\EnterpriseRecruitment', 'Enterprise Name', 'ID');
    }
    public function assessors()
    {
        return $this->hasMany('App\Assessors', 'Enterprise link', 'ID');
    }

    public function intervention(){
        return $this->belongsTo('App\EntIntervention', 'If Yes, Which', 'ID');
    }

    public function posttrainingsupport(){
        return $this->hasMany('App\PostTrainingEmployment', 'Enterprise Name', 'ID');
    }

    public static $sectors = [
        'Beauty' => 'Beauty', 
        'Hospitality' => 'Hospitality', 
        'Manufacture' => 'Manufacture', 
        'Footwear' => 'Footwear',
        'Construction' => 'Construction',
        'Education' => 'Education',
        'Handicrafts' => 'Handicrafts',
        'Massage & Spa' => 'Massage & Spa',
        'Mechanic' => 'Mechanic',
        'Travel Service' => 'Travel Service',
        'No Sector' => 'No Sector',

    ];

    public static $yes_no = [
        'No'   =>'No',
        'Yes'  =>'Yes'
    ];

    public static $licenses = [
       'មានអាជ្ញាប័ណ្ណ៊/License' => 'មានអាជ្ញាប័ណ្ណ៊/License', 
       'គ្មានអាជ្ញាប័ណ្ណ/ No license' => 'គ្មានអាជ្ញាប័ណ្ណ/ No license'
    ];

    public static $sdp_skills  = [
        ''       => '',
        'Yes'    => 'Yes',
        'No'     => 'No',
        'Unsure' => 'Unsure'
    ];

    public static function loops($start, $end)
    {
        $loops = [];
        $loops = ['' => ''];
        for($i = $start; $i <= $end; $i++):
            $loops[$i]  = $i;
        endfor;

        return $loops;
    }   

    public static $sex = [
        'Male' => 'Male',
        'Female' => 'Female',
        'Other' => 'Other'
    ];

    public static $last_grade = [
        '12' => '12',
        'Associate' => 'Associate',
        'Bachelor' => 'Bachelor',
        'Masters' => 'Masters'
    ];

}
