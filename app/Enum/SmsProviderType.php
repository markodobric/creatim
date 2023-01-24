<?php

declare(strict_types=1);

namespace App\Enum;

enum SmsProviderType: string
{
    case Rest = 'rest';
    case Soap = 'soap';
}
