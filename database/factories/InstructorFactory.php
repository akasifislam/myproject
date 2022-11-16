<?php

namespace Database\Factories;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class InstructorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instructor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(30, 600);
        $image = 'https://picsum.photos/id/' . $id . '/700/600';
        $firstname = $this->faker->sentence($nbWords = 1, $variableNbWords = true);
        $lastname = $this->faker->sentence($nbWords = 1, $variableNbWords = true);

        return [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'profession' => $this->faker->name,
            'slug' => Str::slug($firstname . '-' . $lastname),
            'email' => $this->faker->safeEmail,
            'password' => bcrypt('password'),
            'image' => $image,
            'phone' => $this->faker->phoneNumber,
            'about' =>  $this->faker->paragraph,
            'address' =>  $this->faker->address,
            'gender' => Arr::random(['Male', 'Female']),
            'status' => Arr::random([true, false]),
            'total_stars' => rand(50, 400),
            'total_reviews' => rand(20, 50),
        ];
    }
}
