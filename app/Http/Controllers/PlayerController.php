<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        return view('pages.players.players');
    }

    public function players()
    {
        $players = Player::query()->with(['contracts'])->where('is_public', 1)->paginate(15);
        return response()->json($players);
    }

    public function single(Player $player)
    {
        return view('pages.players.single',[
            'player' => $player
        ]);
    }
}
