<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_group;
use App\Models\Course;

class CourseStat extends Controller
{
    public function getIndex()
    {
        $data['groups'] = Course_group::all();
    //    foreach(Course_group::all() as $group) {
    //         $group->courses;
    //    }
       return view('coursestat', $data);
    }
}
