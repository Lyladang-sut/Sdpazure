<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCode extends Model
{
    
    protected $table = 'Access.Coursecode';

    public function CourseTopic(){

        return $this->belongsTo('App\CourseTopic', 'Course code', 'Course code');

    }

}
