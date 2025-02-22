<?php

namespace App\Providers;

use App\Events\SendSmsCode;
use App\Events\SendOrderSms;
use App\Events\SendEmailCode;
use App\Events\SendVerifyEmailCode;
use Illuminate\Auth\Events\Registered;

use App\Listeners\SendEmailCodeNotification;
use App\Listeners\SendVerifyEmailCodeNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendEmailCode::class              => [
            SendEmailCodeNotification::class
        ],
        SendVerifyEmailCode::class              => [
            SendVerifyEmailCodeNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}