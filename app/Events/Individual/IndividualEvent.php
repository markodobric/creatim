<?php

declare(strict_types=1);

namespace App\Events\Individual;

use App\Events\Event;
use App\Models\Individual;

abstract class IndividualEvent extends Event
{
    public function __construct(public Individual $individual)
    {
    }
}
