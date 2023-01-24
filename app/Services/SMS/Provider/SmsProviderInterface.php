<?php

declare(strict_types=1);

namespace App\Services\SMS\Provider;

use App\Dto\PhoneNumber;
use App\Enum\SmsProviderType;

interface SmsProviderInterface
{
    public function send(PhoneNumber $phoneNumber, string $message): void;

    public function getType(): SmsProviderType;
}
