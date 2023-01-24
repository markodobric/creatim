<?php

declare(strict_types=1);

namespace App\Services\SMS\Resolver;

use App\Enum\SmsProviderType;
use App\Services\SMS\Provider\SmsProviderInterface;

interface SmsProviderResolverInterface
{
    public function getProvider(): SmsProviderInterface;

    public function increaseMessageCount(SmsProviderType $providerType): void;
}
