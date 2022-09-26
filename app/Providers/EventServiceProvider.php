<?php

namespace App\Providers;

use App\Listeners\TelegramSubscriberListener;
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
    ];

    protected $subscribe = [
      
    ];

    public function boot()
    {
        //
    }


    public function shouldDiscoverEvents()
    {
        return false;
    }
}
