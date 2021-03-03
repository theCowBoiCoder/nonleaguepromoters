<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserHasRegisteredNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $player)
    {
        $this->user = $user;
        $this->player = $player;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->bcc('hayden@togadevelopment.co.uk')
            ->subject('New User Has Registered')
            ->greeting('Great News!')
            ->line('New users has signed up to the system')
            ->line("NAME: {$this->user->name}")
            ->line("EMAIL: {$this->user->email}")
            ->line("DOB: {$this->player->dob}")
            ->line("POSITION: {$this->player->preferred_position}")
            ->line("HEIGHT: {$this->player->height}")
            ->line("GENDER: {$this->player->gender}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
