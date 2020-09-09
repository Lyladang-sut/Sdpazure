<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpRegistration extends Model
{
    protected $table = 'Access.Registration data' ; 

    public function trainee()
    {
        return $this->belongsTo('App\Trainee', 'ID', 'Application ID');
    }

    public function targetJob()
    {
        return $this->belongsTo('App\DimTargetJob', 'Target Job', 'ID');
    }

    public static $idTypes = [
        '' => '',
        'សំបុត្រកំណើត/Birth Certificate' => 'សំបុត្រកំណើត/Birth Certificate',
        'អត្តសញ្ញាណប័ណ្ណ/Identification Card'   => 'អត្តសញ្ញាណប័ណ្ណ/Identification Card',
        'សៀវភៅគ្រួសារ/Family Book'  => 'សៀវភៅគ្រួសារ/Family Book', 
        'គ្មានទេ/None' => 'គ្មានទេ/None'
    ];

}
