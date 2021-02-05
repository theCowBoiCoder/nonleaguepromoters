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

        $counties = ['Bedfordshire', 'Buckinghamshire', 'Cambridgeshire', 'Cheshire', 'Cleveland', 'Cornwall', 'Cumbria', 'Derbyshire', 'Devon', 'Dorset', 'Durham', 'East Sussex', 'Essex', 'Gloucestershire', 'Greater London', 'Greater Manchester', 'Hampshire', 'Hertfordshire', 'Kent', 'Lancashire', 'Leicestershire', 'Lincolnshire', 'Merseyside', 'Norfolk', 'North Yorkshire', 'Northamptonshire', 'Northumberland', 'Nottinghamshire', 'Oxfordshire', 'Shropshire', 'Somerset', 'South Yorkshire', 'Staffordshire', 'Suffolk', 'Surrey', 'Tyne and Wear', 'Warwickshire', 'West Berkshire', 'West Midlands', 'West Sussex', 'West Yorkshire', 'Wiltshire', 'Worcestershire', 'Flintshire', 'Glamorgan', 'Merionethshire', 'Monmouthshire', 'Montgomeryshire', 'Pembrokeshire', 'Radnorshire', 'Anglesey', 'Breconshire', 'Caernarvonshire', 'Cardiganshire', 'Carmarthenshire', 'Denbighshire', 'berdeen City', 'Aberdeenshire', 'Angus', 'Argyll and Bute', 'City of Edinburgh', 'Clackmannanshire', 'Dumfries and Galloway', 'Dundee City', 'East Ayrshire', 'East Dunbartonshire', 'East Lothian', 'East Renfrewshire', 'Eilean Siar', 'Falkirk', 'Fife', 'Glasgow City', 'Highland', 'Inverclyde', 'Midlothian', 'Moray', 'North Ayrshire', 'North Lanarkshire', 'Orkney Islands', 'Perth and Kinross', 'Renfrewshire', 'Scottish Borders', 'Shetland Islands', 'South Ayrshire', 'South Lanarkshire', 'Stirling', 'West Dunbartonshire', 'West Lothian', 'Antrim', 'Armagh', 'Down', 'Fermanagh', 'Derry and Londonderry', 'Tyrone'];
        return [
            'name' => $this->faker->name,
            'dob' => $this->faker->dateTimeBetween('1990-01-01', '2010-01-01'),
            'bio' => $this->faker->sentence,
            'county' => $counties[array_rand($counties)],
            'country' => $this->faker->country,
            'is_public' => $this->faker->boolean(),
            'profile_image' => $this->faker->imageUrl(200, 200)
        ];
    }
}
