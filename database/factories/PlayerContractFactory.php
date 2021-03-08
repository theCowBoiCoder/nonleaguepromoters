<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\PlayerContract;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlayerContract::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        $contract_types = ['professional', 'semi-professional', 'non-contract', 'amateur-contract'];
        $players = Player::query()->get();
        return [
            'player_id' => $players[random_int(0, 99)]->id,
            'contracted_club' => $this->faker->company,
            'contract_type' => $contract_types[array_rand(['professional', 'semi-professional', 'non-contract', 'amateur-contract'])],
            'contact_expiry_date' => Carbon::today()->addDays(random_int(1, 365))->toDateString(),
            'transfer_date' => Carbon::today()->addDays(random_int(1, 365))->toDateString(),
            'wage' => rand(1, 50000),
            'goal_bonus' => rand(1, 1000),
            'clean_sheet_bonus' => rand(1, 1000),
            'top_goal_scorer_bonus' => rand(1, 1000),
            'promotion_bonus' => rand(1, 1000),
            'min_release_clause' => rand(1, 1000),
            'relegation_bonus' => rand(1, 1000),
            'yearly_wage_rise' => rand(1, 1000),
            'promotion_wage_rise' => rand(1, 1000),
            'sell_on_fee_percentage' => rand(1, 1000),
        ];
    }
}
