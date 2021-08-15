<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Postmark\PostmarkClient;

class UserRegisterNotification extends Notification
{
    use Queueable;

    private $password;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @param $password
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
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
            ->subject('Thank you for joining Non League Promoters')
            ->greeting("Hello {$this->user->name}")
            ->line('Welcome and thank you for joining Non League Promoters')
            ->line("Your Password is ***{$this->password}***");
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
