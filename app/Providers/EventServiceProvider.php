<?php

namespace App\Providers;

use App\Events\Individual\IndividualCreated;
use App\Events\Individual\IndividualDeleted;
use App\Events\Individual\IndividualUpdated;
use App\Events\LegalEntity\LegalEntityCreated;
use App\Events\LegalEntity\LegalEntityDeleted;
use App\Events\LegalEntity\LegalEntityUpdated;
use App\Events\Sms\SmsSentEvent;
use App\Listeners\Sms\IncreaseProviderMessageCount;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        LegalEntityCreated::class => [],
        LegalEntityUpdated::class => [],
        LegalEntityDeleted::class => [],

        IndividualCreated::class => [],
        IndividualUpdated::class => [],
        IndividualDeleted::class => [],

        SmsSentEvent::class => [
            IncreaseProviderMessageCount::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
