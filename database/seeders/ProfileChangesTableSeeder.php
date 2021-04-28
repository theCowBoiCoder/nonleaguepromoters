<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class ProfileChangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = Player::query()->get();
        foreach ($players as $player){
            $player->user->gender = $player->gender;
            $player->user->bio = $player->bio;
            $player->user->dob = $player->dob;
            $player->user->county = $player->county;
            $player->user->region = $player->region;
            $player->user->profile_image = $player->profile_image;
            $player->user->twitter_url = $player->twitter_url;
            $player->user->instagram_url = $player->instagram_url;
            $player->user->youtube_url = $player->youtube_url;
            $player->user->is_public = $player->is_public;
            $player->user->save();
        }

        $staffs = Staff::query()->get();
        foreach ($staffs as $staff){
            $staff->user->gender = $staff->gender;
            $staff->user->bio = $staff->bio;
            $staff->user->dob = $staff->dob;
            $staff->user->county = $staff->county;
            $staff->user->region = $staff->region;
            $staff->user->profile_image = $staff->profile_image;
            $staff->user->twitter_url = $staff->twitter_url;
            $staff->user->instagram_url = $staff->instagram_url;
            $staff->user->youtube_url = $staff->youtube_url;
            $staff->user->is_public = $staff->is_public;
            $staff->user->save();
        }
    }
}
