<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManualResult extends Model
{
    protected $table        = 'Access.ManualResultsEntry';

    protected $primaryKey   = 'ID';

    public $timestamps      = false;

    protected $fillable     = [
        'Entry date', 'Indicator', 'Result', 'Sex', 'Notes'
    ];

    public function indicator()
    {
        return $this->belongsTo('App\Indicator', 'Indicator', 'ID');
    }

    public static $sex = [

        '' => '' ,
        'Male' => 'Male' ,
        'Female' => 'Female' , 
        'Not Applicable' => 'Not Applicable' ,
    ];

}
