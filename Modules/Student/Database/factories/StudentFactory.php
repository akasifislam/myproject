<?php
namespace Modules\Student\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Student\Entities\Student::class;

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
            'slug' => Str::slug($firstname.'-'. $lastname),
            'email' => $this->faker->safeEmail,
            'password' => bcrypt('password'),
            'image' => $image,
            'phone' => $this->faker->phoneNumber,
            'nationality' => $this->faker->country,
            'profession' => $this->faker->jobTitle,
            'about' =>  $this->faker->paragraph,
        ];
    }
}

