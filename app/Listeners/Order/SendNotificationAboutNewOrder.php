<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderUpdated;
use App\Models\Admin;
use App\Notifications\Order\NewOrderNotification;

class SendNotificationAboutNewOrder
{
    public function __construct()
    {
    }

    public function handle(OrderUpdated $event): void
    {
        if ($event->order->isDirty('status')) {
            if ($event->order->status === 1) {
                $admin = Admin::first();
                $admin->notify(new NewOrderNotification($event->order));
            }
            //if ()
        }
    }
}
