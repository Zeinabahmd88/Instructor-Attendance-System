<?php
// app/Notifications/ReasonRequested.php
// app/Notifications/ReasonRequested.php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReasonRequested extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('You have a new request to provide a reason for your absence.')
                    ->action('Provide Reason', url('/doctor/reason-form'))
                    ->line('Thank you for your prompt attention to this matter.');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'You have a new request to provide a reason for your absence.',
            'action_url' => url('/doctor/reason-form')
        ];
    }
}
