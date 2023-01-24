<?php

namespace App\Services\SMS\Provider;

use App\Dto\PhoneNumber;
use App\Enum\SmsProviderType;
use App\Services\SoapClient\ExistingSoapClientInterface;

class SoapSmsProvider implements SmsProviderInterface
{
    public function __construct(private ExistingSoapClientInterface $existingSoapClient)
    {
    }

    public function send(PhoneNumber $phoneNumber, string $message): void
    {
        ($this->existingSoapClient)($phoneNumber->getValue(), $message);
    }

    public function getType(): SmsProviderType
    {
        return SmsProviderType::Soap;
    }
}
