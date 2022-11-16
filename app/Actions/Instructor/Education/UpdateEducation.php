<?php

namespace App\Actions\Instructor\Education;

class UpdateEducation
{
    public static function update($request, $education)
    {
        return $education->update($request->all());
    }
}
