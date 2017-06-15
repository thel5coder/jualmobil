<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\UserRegister' => [
            'App\Listeners\NewUserRegistered',
        ],
        'App\Events\NewListingPost' => [
            'App\Listeners\NewUserListingWasPosted',
        ],
        'App\Events\ResultModerationListing' => [
            'App\Listeners\SendResultModerationListing',
        ],
        'App\Events\NewBeritaPost' => [
            'App\Listeners\NewBeritaWasPosted',
        ],
        'App\Events\ResultModerationBerita' => [
            'App\Listeners\SendResultModerationBerita',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
