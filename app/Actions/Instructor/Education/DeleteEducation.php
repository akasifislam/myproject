<?php

namespace App\Actions\Instructor\Education;

use Modules\Instructor\Entities\InstructorEducation;

class DeleteEducation
{
    public static function delete($education)
    {
        return $education->delete();
    }
}
