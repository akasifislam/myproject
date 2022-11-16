<?php

namespace Modules\Course\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Course\Entities\Course;
use Illuminate\Support\Str;

class ChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Course\Entities\Chapter::class;

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
            'name' => $title,
            'slug' => Str::slug($title),
        ];
    }
}
