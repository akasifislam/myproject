<?php

namespace App\Actions\Instructor\Education;

use Modules\Instructor\Entities\InstructorEducation;

class CreateEducation
{
    public static function create($request)
    {
        return InstructorEducation::create($request);
    }
}
