<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(30, 600);
        $image = 'https://picsum.photos/id/' . $id . '/700/600';
        $first = $this->faker->sentence($nbWords = 2, $variableNbWords = true);
        $last = $this->faker->sentence($nbWords = 2, $variableNbWords = true);

        return [
            'firstname' => $first,
            'lastname' => $last,
            'slug' => Str::slug($first . '-' . $last),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'image' => $image,
            'phone' => $this->faker->phoneNumber,
            'nationality' => $this->faker->country,
            'profession' => $this->faker->name,
            'about' => $this->faker->paragraph,
            'remember_token' => Str::random(10),
        ];
    }
}
