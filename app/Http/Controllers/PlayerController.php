<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::query()->with('contracts')->where('is_public', 1)->get();
        return view('pages.players.players',compact('players'));
    }

    public function single(Player $player)
    {
        return view('pages.players.single',[
            'player' => $player
        ]);
    }
}
