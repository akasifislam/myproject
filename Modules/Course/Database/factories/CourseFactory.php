<?php

namespace Modules\Course\Database\factories;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Category\Entities\Category;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Course\Entities\Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(30, 600);
        $image = 'https://picsum.photos/id/' . $id . '/700/600';
        $title = $this->faker->sentence($nbWords = 3, $variableNbWords = true);

        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'instructor_id' => Instructor::inRandomOrder()->first()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'description' =>  $this->faker->paragraph,
            'thumbnail' => $image,
            'price' => rand(200, 400),
            'discount_price' => rand(200, 400),
            'level' => Arr::random(['Beginner', 'Intermediate', 'Advanced', 'Expert']),
            'duration' => Arr::random(['2', '3', '5']),
            'course_type' => Arr::random(['Paid', 'Free']),
            'video_type' => Arr::random(['youtube', 'vimeo']),
            'video_url' => 'https://example.com',
            'status' => Arr::random([true, false]),
        ];
    }
}
