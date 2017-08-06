<?php

namespace Api\Areas;

use Infrastructure\Events\EventServiceProvider;
use Api\Areas\Events\AreaWasCreated;
use Api\Areas\Events\AreaWasDeleted;
use Api\Areas\Events\AreaWasUpdated;

class AreaServiceProvider extends EventServiceProvider
{
    protected $listen = [
        AreaWasCreated::class => [
            // listeners for when an area is created
        ],
        AreaWasDeleted::class => [
            // listeners for when an area is deleted
        ],
        AreaWasUpdated::class => [
            // listeners for when an area is updated
        ]
    ];
}
