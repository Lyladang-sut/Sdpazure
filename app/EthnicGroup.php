<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EthnicGroup extends Model
{
    
    protected $table = 'Access.Ethnic group';

    public function trainees()
    {
        return $this->hasMany('App\Trainee', 'If Yes EMG', 'ID');
    }

    public static function options()
    {
        $options = \DB::table('Access.Ethnic group')->select('ID', 'Combined Khmer')->get()->toArray();
        $returns = array();
        if($options):
            foreach($options as $option):
                $returns[$option->ID] = $option->{'Combined Khmer'}; 
            endforeach;
        endif;

        return $returns;
    }

}
