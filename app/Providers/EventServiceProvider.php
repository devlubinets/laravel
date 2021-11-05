<?php

namespace App\Providers;

use App\Events\Order\OrderCreated;
use App\Events\Order\OrderUpdated;
use App\Events\User\UserCreated;
use App\Listeners\Order\SendNewOrderDbNotification;
use App\Listeners\Order\SendNotificationAboutNewOrder;
use App\Listeners\User\SendNotificationAboutNewUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserCreated::class => [
            SendNotificationAboutNewUser::class,
        ],
        OrderUpdated::class => [
            SendNotificationAboutNewOrder::class,
//            SendNewOrderDbNotification::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();

        //
    }
}
