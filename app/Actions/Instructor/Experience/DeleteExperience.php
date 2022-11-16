<?php

namespace App\Actions\Instructor\Experience;

class DeleteExperience
{
    public static function delete($experience)
    {
        return $experience->delete();
    }
}
