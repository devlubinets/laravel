<?php

namespace App\Notifications\Order;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class NewOrderNotification extends Notification
{
    use Queueable, SerializesModels;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('У вас новый заказ №' . $this->order->id)
            ->line('Перейдите в магазин для оформление заказа')
            ->action('Просмотр заказов', url('/admin/orders'))
            ->line('Спасибо за использование!');
    }

}
