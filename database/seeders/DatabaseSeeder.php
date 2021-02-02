<?php

namespace Database\Seeders;

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
        Player::factory(100)->create();
        PlayerHistory::factory(500)->create();
        $this->call(PositionsTableSeesder::class);
    }
}
