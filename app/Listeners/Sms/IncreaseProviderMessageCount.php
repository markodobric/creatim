<?php

declare(strict_types=1);

namespace App\Listeners\Sms;

use App\Events\Sms\SmsSentEvent;
use App\Services\SMS\Resolver\SmsProviderResolverInterface;

class IncreaseProviderMessageCount
{
    public function __construct(private SmsProviderResolverInterface $smsProviderResolver)
    {
    }

    public function handle(SmsSentEvent $event): void
    {
        $this->smsProviderResolver->increaseMessageCount($event->providerType);
    }
}
