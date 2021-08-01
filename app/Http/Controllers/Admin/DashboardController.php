<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::with(['staff', 'player'])->get();
        $players = Player::query()->get();
        $staffs = Staff::query()->get();
        return view('admin.dashboard', [
            'users' => $users,
            'players' => $players,
            'staffs' => $staffs
        ]);
    }
}
