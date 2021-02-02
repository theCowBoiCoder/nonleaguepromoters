<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::query()->where('is_public', 1)->paginate(15);

        return view('pages.players.players', [
            'players' => $players
        ]);
    }

    public function single(Player $player)
    {
        return view('pages.players.single',[
            'player' => $player
        ]);
    }
}
