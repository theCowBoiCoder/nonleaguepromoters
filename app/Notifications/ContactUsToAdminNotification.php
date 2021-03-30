<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsToAdminNotification extends Notification
{
    use Queueable;

    private $data;
    private $name;
    private $email;
    private $subject;
    private $message;

    /**
     * Create a new notification instance.
     *
     * @param $name
     * @param $email
     * @param $subject
     * @param $message
     */
    public function __construct($name,$email,$subject,$message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Contact Us has been filled in')
            ->greeting('We have had a member contact us.')
            ->line("Name: {$this->name}")
            ->line("Email: {$this->email}")
            ->line("Subject: {$this->subject}")
            ->line("Message: {$this->message}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
