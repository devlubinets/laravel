<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserNotification extends Notification
{
    use Queueable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject(config('app.name') .' | New user')
                    ->view(
                        'mails.admin.new-user',
                        [
                            'user' => $this->user,
                            'admin' => $notifiable,
                        ]
                    );
    }

    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
