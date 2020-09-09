<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnterpriseRecruitment extends Model
{
    protected $table = 'Access.Enterprise Recruitment follow up';

    // Delare to make change 
    protected $primaryKey   = 'ID';
    public $timestamps      = false;
    protected $guarded      = ['ID']; // Need to guard ID
    

    public function enterprise()
    {
        return $this->belongTo('App\Enterprise', 'ID', 'Enterprise Name'  );
    }
}
