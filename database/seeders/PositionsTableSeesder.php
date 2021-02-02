<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeesder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            'GK',
            'LB',
            'LWB',
            'CB',
            'RWB',
            'RB',
            'RW',
            'RM',
            'CAM',
            'CDM',
            'CM',
            'LW',
            'LM',
            'LF',
            'RF',
            'CF',
            'ST'
        ];

        foreach ($positions as $position){
            Position::query()->create([
                'name' => $position
            ]);
        }
    }
}
