<?php

namespace Api\Areas\Events;

use Infrastructure\Events\Event;
use Api\Areas\Models\Area;

class AreaWasDeleted extends Event
{
    public $area;

    public function __construct(Area $area)
    {
        $this->area = $area;
    }
}
