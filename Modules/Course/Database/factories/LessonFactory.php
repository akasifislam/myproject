<?php

namespace Modules\Course\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Modules\Course\Entities\Chapter;
use Modules\Course\Entities\Course;
use Illuminate\Support\Str;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Course\Entities\Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence($nbWords = 1, $variableNbWords = true);

        return [
            'course_id' => Course::inRandomOrder()->first()->id,
            'chapter_id' => Chapter::inRandomOrder()->first()->id,
            'lesson_name' => $title,
            'slug' => Str::slug($title),
            'duration' => Arr::random(['2', '3', '5']),
            'video_url' => 'https://www.youtube.com/watch?v=1rgM4JH2vEo',
        ];
    }
}
