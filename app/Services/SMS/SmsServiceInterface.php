<?php

declare(strict_types=1);

namespace App\Services\SMS;

use App\Models\Group;
use App\Models\Individual;

interface SmsServiceInterface
{
    public function sendToIndividual(Individual $individual, string $message): bool;

    public function sendToGroup(Group $group, string $message): bool;
}
