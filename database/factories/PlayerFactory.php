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

        $positions = Position::query()->get();
        $users = User::query()->get();
        return [
            'user_id' => $users[random_int(0, 99)]->id,
            'preferred_position' => $positions[random_int(0, 16)]->name,
        ];
    }
}
