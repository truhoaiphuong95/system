<?php

namespace Core\Services;

use Core\Services\CourseGroupServiceContract;
use Core\Services\CourseStudentServiceContract;

class CourseRelatedService
{
    public $group;
    public $log;
    public $student;

    public function __construct(CourseGroupServiceContract $group, CourseStudentServiceContract $student)
    {
        $this->group = $group;
        $this->student = $student;
    }
}