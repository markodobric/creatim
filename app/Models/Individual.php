<?php

declare(strict_types=1);

namespace App\Models;

use App\Events\Individual\IndividualCreated;
use App\Events\Individual\IndividualDeleted;
use App\Events\Individual\IndividualUpdated;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $email
 * @property string $full_name
 * @property string $phone_number
 */
class Individual extends BaseModel
{
    protected $dispatchesEvents = [
        'created' => IndividualCreated::class,
        'updated' => IndividualUpdated::class,
        'deleted' => IndividualDeleted::class,
    ];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }
}
