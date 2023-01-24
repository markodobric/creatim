<?php

declare(strict_types=1);

namespace App\Dto;

use LogicException;

class PhoneNumber
{
    public function __construct(private string $phoneNumber)
    {
        if (!preg_match('/^\\+?[1-9][0-9]{7,14}$/', $this->phoneNumber)) {
            throw new LogicException(
                sprintf(
                    'Value %s is not valid phone number.',
                    $this->phoneNumber
                )
            );
        }
    }

    public function getValue(): string
    {
        return $this->phoneNumber;
    }
}
