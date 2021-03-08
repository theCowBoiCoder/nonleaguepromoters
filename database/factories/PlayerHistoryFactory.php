<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\PlayerHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlayerHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {

        $season = [
            '2001/2002',
            '2002/2003',
            '2003/2004',
            '2004/2005',
            '2005/2006',
            '2006/2007',
            '2007/2008',
            '2008/2009',
            '2010/2011',
            '2012/2013',
        ];
        $players = Player::query()->get();
        return [
            'player_id' => $players[random_int(0, 99)]->id,
            'season' => $season[array_rand($season)],
            'club' => $this->faker->company,
            'appearances' => random_int(1,500),
            'goals' => random_int(1,100),
            'assists' => random_int(1,100),
            'clean_sheets' => random_int(1,50),
        ];
    }
}
