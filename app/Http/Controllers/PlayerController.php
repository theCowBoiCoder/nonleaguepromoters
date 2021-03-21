<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Position;
use App\Models\Region;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $regions = Region::query()->select('region')->groupBy('region')->get();
        $counties = Region::query()->orderBy('county', 'ASC')->get();
        $positions = Position::query()->get();
        return view('pages.players.players', [
            'regions' => $regions,
            'counties' => $counties,
            'positions' => $positions
        ]);
    }

    public function players(Request $request)
    {
        if ($request->term == 'undefined' || $request->term == 'null') {
            $term = null;
        } else {
            $term = $request->term;
        }

        if ($request->region == 'undefined' || $request->region == 'null' || $request->region == 'selected') {
            $region = null;
        } else {
            $region = $request->region;
        }

        if ($request->county == 'undefined' || $request->county == 'null' || $request->county == 'selected') {
            $county = null;
        } else {
            $county = $request->county;
        }

        if ($request->gender == 'undefined' || $request->gender == 'null' || $request->gender == 'selected') {
            $gender = null;
        } else {
            $gender = $request->gender;
        }

        if ($request->position == 'undefined' || $request->position == 'null' || $request->position == 'selected') {
            $position = null;
        } else {
            $position = $request->position;
        }


        $player = Player::query();
        if ($term != null) {
            $player->where('name', 'LIKE', '%' . $term . '%');
        }
        if ($region != null) {
            $player->where('region', $request->region);
        }

        if ($county != null) {
            $player->where('county', $county);
        }

        if ($gender != null) {
            $player->where('gender', $gender);
        }

        if ($position != null) {
            $player->where('preferred_position', $position);
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
