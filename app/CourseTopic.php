<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTopic extends Model
{
    
    protected $table = 'Access.CourseTopic';

    public function coursecodes(){

        return $this->hasMany('App\Coursecode', 'Course code', 'Course code');
        
    }

}
