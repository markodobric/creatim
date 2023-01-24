<?php

declare(strict_types=1);

namespace App\Events\Sms;

use App\Enum\SmsProviderType;
use App\Events\Event;

class SmsSentEvent extends Event
{
    public function __construct(public SmsProviderType $providerType)
    {
    }
}
