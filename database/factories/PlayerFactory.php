<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Position;
use App\Models\Region;
use App\Models\User;
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

        $counties = [];
        $regions = Region::query()->get();
        foreach ($regions as $region){
            $counties[] = $region->county;
        }

        $county = $counties[array_rand($counties)];
        $positions = Position::query()->get();
        $users = User::query()->get();
        return [
            'user_id' => $users[random_int(0, 99)]->id,
            'name' => $this->faker->name,
            'preferred_position' => $positions[random_int(0, 16)]->name,
            'dob' => $this->faker->dateTimeBetween('1990-01-01', '2010-01-01'),
            'bio' => $this->faker->sentence,
            'gender' => $this->faker->randomElement(['MALE', 'FEMALE']),
            'county' => $county,
            'region' => Region::query()->where('county',$county)->first()->region,
            'is_public' => $this->faker->boolean(),
        ];
    }
}
