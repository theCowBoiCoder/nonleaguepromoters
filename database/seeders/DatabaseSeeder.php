<?php

namespace Database\Seeders;

use App\Models\PlayerContract;
use App\Models\Player;
use App\Models\PlayerHistory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PositionsTableSeesder::class);
       // Player::factory(100)->create();
        //PlayerContract::factory(80)->create();
        //PlayerHistory::factory(100)->create();

    }
}
