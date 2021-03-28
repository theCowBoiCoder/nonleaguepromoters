<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function messages(Player $player)
    {
        $messages = Message::query()->where('receiver_user_id', $player->id)->paginate(5);

        return view('pages.message', [
            'messages' => $messages
        ]);
    }

    public static function countMessages()
    {
        return Message::query()->where('receiver_user_id', Auth::user()->id)->where('has_read', 0)->count();
    }

    public function readMessages(User $user, Request $request)
    {
        Message::query()->where('id', $request->segment(4))->update(['has_read' =>  1]);

        return redirect()->back();
    }


}
