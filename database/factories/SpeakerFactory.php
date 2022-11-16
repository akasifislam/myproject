<?php

namespace Database\Factories;

use App\Models\Instructor;
use App\Models\Speaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Event\Entities\Event;

class SpeakerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Speaker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_id' => Event::inRandomOrder()->first()->id,
            'instructor_id' => Instructor::inRandomOrder()->first()->id,
        ];
    }
}
