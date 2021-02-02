<?php

namespace Database\Factories;

use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

class PlayerFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name,
            'dob' => $this->faker->dateTimeBetween('1990-01-01','2010-01-01'),
            'bio' => $this->faker->sentence,
            'is_public' => $this->faker->boolean(),
            'profile_image' => $this->faker->imageUrl(200,200)
        ];
    }
}
