<?php

namespace App\Actions\Instructor\Experience;

use Modules\Instructor\Entities\InstructorExperience;


class CreateExperience
{
    public static function create($request)
    {
        return InstructorExperience::create($request);
    }
}
