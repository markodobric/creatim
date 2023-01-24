<?php

declare(strict_types=1);

namespace App\Services\SMS\Provider;

use App\Dto\PhoneNumber;
use App\Enum\SmsProviderType;

class RestSmsProvider implements SmsProviderInterface
{
    public function __construct(private string $url)
    {
    }

    public function send(PhoneNumber $phoneNumber, string $message): void
    {
        // send http post request to the $this->url
    }

    public function getType(): SmsProviderType
    {
        return SmsProviderType::Rest;
    }
}
