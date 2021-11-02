<?php

namespace App\Listeners\User;

use App\Events\User\UserCreated;
use App\Models\Admin;
use App\Notifications\NewUserNotification;

class SendNotificationAboutNewUser
{
    public function __construct()
    {
        //
    }

    public function handle(UserCreated $event): void
    {
        $admin = Admin::first();
        $admin->notify(new NewUserNotification($event->user));
//        $this->user = $event->user;
    }
}
