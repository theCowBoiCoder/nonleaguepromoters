<?php

namespace App\Message;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Messages
{
    public static function send($user_id, Request $request)
    {
        Message::query()->create([
            'sender_user_id' => (Auth::user() != null) ? Auth::user()->id : NULL,
            'receiver_user_id' => $user_id,
            'subject' => $request->subject,
            'message' => encrypt($request->message),
            'from' => $request->from_name
        ]);

        return 'Your message has been sent';
    }
}
