<?php

namespace Modules\Event\Database\factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Category\Entities\Category;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Event\Entities\Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(30, 600);
        $image = 'https://picsum.photos/id/' . $id . '/700/600';
        $title = $this->faker->sentence($nbWords = 4, $variableNbWords = true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category_id' => Category::inRandomOrder()->first()->id,
            'date' => Arr::random(['11/05/2020', '11/06/2021', '11/07/2021', '11/08/2021', '11/09/2020', '11/10/2021', '11/11/2021', '11/12/2021', '11/06/2020', '11/07/2021', '11/06/2020', '11/08/2021', '11/08/2021']),
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'starting_time' => Arr::random(['02:47 PM', '03:47 PM', '04:47 PM', '05:47 PM', '06:47 PM']),
            'ending_time' => Arr::random(['02:47 PM', '03:47 PM', '04:47 PM', '05:47 PM', '06:47 PM']),
            'address' => $this->faker->address,
            'total_seat' => rand(120, 150),
            'description' =>  $this->faker->paragraph,
            'thumbnail' => $image,
            'price' => rand(200, 400),
            'event_type' => Arr::random(['Paid', 'Free']),
        ];
    }
}
