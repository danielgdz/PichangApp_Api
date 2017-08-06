<?php

namespace Api\Companies;

use Infrastructure\Events\EventServiceProvider;
use Api\Companies\Events\CompanyWasCreated;
use Api\Companies\Events\CompanyWasDeleted;
use Api\Companies\Events\CompanyWasUpdated;

class CompanyServiceProvider extends EventServiceProvider
{
    protected $listen = [
        CompanyWasCreated::class => [
            // listeners for when a company is created
        ],
        CompanyWasDeleted::class => [
            // listeners for when a company is deleted
        ],
        CompanyWasUpdated::class => [
            // listeners for when a company is updated
        ]
    ];
}
