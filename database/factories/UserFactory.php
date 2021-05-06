<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\Region;
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
        $counties = [];
        $regions = Region::query()->get();
        foreach ($regions as $region){
            $counties[] = $region->county;
        }

        $county = $counties[array_rand($counties)];



        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'dob' => $this->faker->dateTimeBetween('1990-01-01', '2010-01-01'),
            'bio' => $this->faker->sentence,
            'gender' => $this->faker->randomElement(['MALE', 'FEMALE']),
            'county' => $county,
            'region' => Region::query()->where('county',$county)->first()->region,
            'is_public' => $this->faker->boolean(),
        ];
    }
}
