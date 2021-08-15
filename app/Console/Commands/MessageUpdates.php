<?php

namespace App\Console\Commands;

use App\Models\Message;
use App\Notifications\MessageSendNotification;
use App\Notifications\MessageUpdateNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class MessageUpdates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'messages:pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pending Messages';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $messages = Message::query()->where('has_read', 0)->groupBy('receiver_user_id')->get();
        foreach ($messages as $message){
            Notification::route('mail', $message->user->email)->notify(new MessageUpdateNotification($message->user));
        }

    }
}
