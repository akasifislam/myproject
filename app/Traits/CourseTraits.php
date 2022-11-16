<?php

namespace App\Traits;


trait CourseTraits
{
    // level course counting
    protected function levelCourseCounts($allcourse)
    {
        return [
            ['level' => 'Beginner', 'value' => $allcourse->where('level', 'Beginner')->count()],
            ['level' => 'Intermediate', 'value' =>  $allcourse->where('level', 'Intermediate')->count()],
            ['level' => 'Advanced', 'value' => $allcourse->where('level', 'Advanced')->count()],
            ['level' => 'Expert', 'value' => $allcourse->where('level', 'Expert')->count()],
        ];
    }

    // duration course counting
    protected function durationCourseCounts($allcourse)
    {
        return [
            '5_hours' => $allcourse->where('duration', '>=', '5')->count(),
            '0_to_2hours' => $allcourse->where('duration', '<=', '2')->count(),
            '3_to_4hours' => $allcourse
                ->where('duration', '>=', '3')
                ->where('duration', '<=', '4')
                ->count(),
        ];
    }
}
