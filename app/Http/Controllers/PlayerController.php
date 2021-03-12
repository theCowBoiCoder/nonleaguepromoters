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

    public function players(Request $request)
    {
        if ($request->term == 'undefined') {
            $term = null;
        } else {
            $term = $request->term;
        }
        $player = Player::query();
        if ($term != null) {
            $player->where('name', 'LIKE', '%' . $term . '%');
        }
        $player->with(['contracts']);
        $player->where('is_public', 1);

        $players = $player->paginate(15);
        return response()->json($players);
    }

    public function single(Player $player)
    {
        return view('pages.players.single', [
            'player' => $player
        ]);
    }
}
