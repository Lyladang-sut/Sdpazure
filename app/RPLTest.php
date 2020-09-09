<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RPLTest extends Model
{
    protected $table = 'Access.RPL test';

     // Delare to make change 
     protected $primaryKey   = 'ID';
     public $timestamps      = false;
     protected $guarded      = ['ID', 'Monthly Income - USD calc'];

    public function rpl()
    {
        return $this->belongsTo('App\RPL', 'ID', 'RPL ID');
    }

    public function industry()
    {
        return $this->belongsTo('App\Industry', 'Participant Name', 'ID');
    }

    public static $incomes = [

        'USD'   =>  'USD',
        'Riel'   =>  'Riel', 

    ];

    public static $results = [

        'Competent'             => 'Competent',
        'Partially Competent'   => 'Partially Competent', 
        'Not Yet Competent'     => 'Not Yet Competent' ,

    ];
    
    
}
