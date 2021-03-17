<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(storage_path('regions.csv'), "r");

        $header = 1;
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($header == 1) {
                $header++;
                continue;
            }
            $county = $data[0];
            $region = $data[1];

            Region::query()->create([
                'county' => $county,
                'region' => $region
            ]);
        }
    }
}
