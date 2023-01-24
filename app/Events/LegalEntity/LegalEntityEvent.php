<?php

declare(strict_types=1);

namespace App\Events\LegalEntity;

use App\Events\Event;
use App\Models\LegalEntity;

abstract class LegalEntityEvent extends Event
{
    public function __construct(public LegalEntity $legalEntity)
    {
    }
}
