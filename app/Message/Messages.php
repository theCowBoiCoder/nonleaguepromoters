<?php

namespace App\Message;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageSendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class Messages
{
    public static function send($user_id, Request $request): string
    {
        Message::query()->create([
            'sender_user_id' => (Auth::user() != null) ? Auth::user()->id : NULL,
            'receiver_user_id' => $user_id,
            'subject' => $request->subject,
            'message' => encrypt($request->message),
            'from' => $request->from_name
        ]);

        $user = User::query()->find($user_id);
        Notification::route('mail', $user->email)->notify(new MessageSendNotification());

        return 'Your message has been sent';
    }
}
