<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderCreated;
use App\Events\Order\OrderUpdated;
use App\Models\Admin;
use App\Notifications\Order\NewOrderDbNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewOrderDbNotification
{
    public function __construct()
    {
        //
    }

    public function handle(OrderUpdated $event)
    {
        $admin = Admin::first();
        Notification::send($admin, new NewOrderDbNotification($event->order));
    }
}
