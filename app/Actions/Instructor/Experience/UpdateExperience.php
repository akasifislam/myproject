<?php

namespace App\Actions\Instructor\Experience;

class UpdateExperience
{
    public static function update($request, $experience)
    {
        return $experience->update($request->all());
    }
}
