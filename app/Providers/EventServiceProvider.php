<?php

namespace App\Providers;

use App\Events\OrderShipped;
use App\Events\User\UserCreated;
use App\Listeners\SendNewOrderNotification;
use App\Listeners\User\SendNotificationAboutNewUser;
use App\Notifications\User\NewUserNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserCreated::class => [
            SendNotificationAboutNewUser::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();

        //
    }
}
