<?php

namespace Api\Companies\Events;

use Infrastructure\Events\Event;
use Api\Companies\Models\Company;

class CompanyWasUpdated extends Event
{
    public $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }
}
