<?php

namespace Api\Subsidiaries;

use Infrastructure\Events\EventServiceProvider;
use Api\Subsidiaries\Events\SubsidiaryWasCreated;
use Api\Subsidiaries\Events\SubsidiaryWasDeleted;
use Api\Subsidiaries\Events\SubsidiaryWasUpdated;

class SubsidiaryServiceProvider extends EventServiceProvider
{
    protected $listen = [
        SubsidiaryWasCreated::class => [
            // listeners for when a subsidiary is created
        ],
        SubsidiaryWasDeleted::class => [
            // listeners for when a subsidiary is deleted
        ],
        SubsidiaryWasUpdated::class => [
            // listeners for when a subsidiary is updated
        ]
    ];
}
