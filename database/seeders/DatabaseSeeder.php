<?php

namespace Database\Seeders;

use App\Models\PlayerContract;
use App\Models\Player;
use App\Models\PlayerHistory;
use App\Models\User;
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
        if(env('APP_ENV') == 'local'){
            User::factory(100)->create();
            Player::factory(100)->create();
            PlayerContract::factory(50)->create();
            PlayerHistory::factory(50)->create();
        }


    }
}
