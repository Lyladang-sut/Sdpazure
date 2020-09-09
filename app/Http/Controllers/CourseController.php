<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseTopic as CourseTopic;

class CourseController extends Controller
{
    
    public function CourseTopics()
    {

        $data     = [
            'topics' => CourseTopic::get(),
        ];
        return view('course.topics')->with($data);

    }

    public function CoursesByTopic($fuck)
    {
        $topic          = CourseTopic::where('Course code', $fuck)->first();

        $fucks    = [
            'topic'     => $fuck,
            'name'      => 'Dona',
            'topic'     => $topic,
        ];
        return view('course.coursesbytopic')->with($fucks);

    }

}
