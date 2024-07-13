<?php

namespace App\Providers;

use App\Events\OrderCompleted;
use App\Events\OrderRepair;
use App\Events\OrderStatus;
use App\Events\Product;
use App\Listeners\SaveProductAttributes;
use App\Listeners\SendOrderCompletedMail;
use App\Listeners\SendOrderStatusMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\CheckoutRequested' => [
            'App\Listeners\CreateCustomerIfNotExists',
        ],
        OrderRepair::class => [
            \App\Listeners\OrderRepair::class,
        ],
         OrderCompleted::class => [
             SendOrderCompletedMail::class,
        ],
        OrderStatus::class => [
            SendOrderStatusMail::class,
        ],
        Product::class => [
            SaveProductAttributes::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

    }
}
