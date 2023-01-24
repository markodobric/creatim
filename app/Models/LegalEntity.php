<?php

declare(strict_types=1);

namespace App\Models;

use App\Events\LegalEntity\LegalEntityCreated;
use App\Events\LegalEntity\LegalEntityDeleted;
use App\Events\LegalEntity\LegalEntityUpdated;

/**
 * @property string $tax_number
 */
class LegalEntity extends BaseModel
{
    protected $dispatchesEvents = [
        'created' => LegalEntityCreated::class,
        'updated' => LegalEntityUpdated::class,
        'deleted' => LegalEntityDeleted::class,
    ];
}
