<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\PasswordNotification;
use App\Notifications\UserRegisterNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class PasswordResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $users = User::query()->find(155);
        Notification::route('mail', $users->email)->notify(new PasswordNotification($users->id));

    }
}
