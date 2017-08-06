<?php

namespace Api\Subsidiaries\Events;

use Infrastructure\Events\Event;
use Api\Subsidiaries\Models\Subsidiary;

class SubsidiaryWasCreated extends Event
{
    public $subsidiary;

    public function __construct(Subsidiary $subsidiary)
    {
        $this->subsidiary = $subsidiary;
    }
}
