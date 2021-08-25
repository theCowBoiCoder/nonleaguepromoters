<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Player;
use App\Models\User;
use App\Notifications\MessageSendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{

    public function all()
    {
        $messages = Message::query()->orderBy('id', 'DESC')->paginate(15);
        return view('admin.message.view', [
            'messages' => $messages
        ]);
    }

    public function send()
    {
        $players = Player::query()->get();
        return view('admin.message.send', [
            'players' => $players
        ]);
    }

    public function post_message(Request $request)
    {
        if ($request->player_id == 0) {

            foreach (Player::query()->get() as $player) {
                Message::query()->create([
                    'sender_user_id' => (Auth::user() != null) ? Auth::user()->id : NULL,
                    'receiver_user_id' => $player->user_id,
                    'subject' => $request->subject,
                    'message' => encrypt($request->message),
                    'from' => 'Non League Promoters'
                ]);

                $user = User::query()->find($request->player_id);
                Notification::route('mail', $user->email)->notify(new MessageSendNotification());
            }
        } else {
            Message::query()->create([
                'sender_user_id' => (Auth::user() != null) ? Auth::user()->id : NULL,
                'receiver_user_id' => $request->player_id,
                'subject' => $request->subject,
                'message' => encrypt($request->message),
                'from' => 'Non League Promoters'
            ]);

            $user = User::query()->find($request->player_id);
            Notification::route('mail', $user->email)->notify(new MessageSendNotification());
        }


        return redirect()->back()->with('success', 'Message has been sent');
    }
}
